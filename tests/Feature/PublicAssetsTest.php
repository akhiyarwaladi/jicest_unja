<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Tests\TestCase;

class PublicAssetsTest extends TestCase
{
    private function assertPublicFileHasExactCase(string $path): void
    {
        $directory = public_path();
        foreach (explode('/', $path) as $segment) {
            $this->assertContains($segment, scandir($directory), 'Incorrect filename case: '.$path);
            $directory .= DIRECTORY_SEPARATOR.$segment;
        }
        $this->assertFileExists($directory);
    }

    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        $this->withoutVite();
        (require database_path('migrations/2026_08_01_000001_create_fees_table.php'))->up();
    }

    public function test_previously_published_asset_urls_redirect_to_existing_files(): void
    {
        $redirects = config('public-assets');
        $this->assertNotEmpty($redirects);
        foreach ($redirects as $old => $new) {
            $this->assertMatchesRegularExpression('/\A[a-z0-9.\/-]+\z/', $new);
            $this->assertPublicFileHasExactCase($new);
            $this->assertArrayNotHasKey($new, $redirects, 'Redirect chains are unnecessary.');
            $this->assertDoesNotMatchRegularExpression('#^(storage|build)/|^uploads/(fulltext|images|invoice[^/]*|receipt[^/]*|letter-of-acceptance[^/]*|livewire-tmp)/#', $old);
            $url = '/'.implode('/', array_map('rawurlencode', explode('/', $old)));
            $this->get($url)->assertStatus(301)->assertRedirect('/'.$new);
        }
        $old = array_key_first($redirects);
        $this->head('/'.$old)->assertStatus(301)->assertRedirect('/'.$redirects[$old]);
        $this->get('/assets/not-a-published-asset.jpg')->assertNotFound();
    }

    public function test_current_download_endpoints_serve_the_current_documents(): void
    {
        foreach ([
            '/download-abstract-template' => 'jicest-2026-abstract-template.docx',
            '/download-paper-template' => 'jicest-2026-full-paper-template.docx',
            '/download-guidelines-template' => 'jicest-2026-presenter-guidelines.pdf',
        ] as $url => $filename) {
            $response = $this->get($url)->assertOk()->assertDownload($filename);
            $this->assertInstanceOf(BinaryFileResponse::class, $response->baseResponse);
            $this->assertSame(realpath(public_path('uploads/downloads/2026/'.$filename)),
                $response->baseResponse->getFile()->getRealPath());
        }
        $this->get('/download-schedule-template')->assertOk()->assertHeaderMissing('Content-Disposition')
            ->assertSee('Coming soon')->assertSee('The oral presentation schedule for the 4th JICEST 2026 is not available yet.');
    }

    public function test_public_pages_render_and_their_local_assets_exist_with_exact_case(): void
    {
        foreach (['/', '/about-conference', '/registration-fee', '/rundown', '/proceeding', '/contact',
            '/organizing-committe', '/scientific-committe', '/steering-committe', '/field-trip',
            '/kongres-hki', '/login', '/register'] as $url) {
            $response = $this->get($url)->assertOk();
            $document = new \DOMDocument();
            $previous = libxml_use_internal_errors(true);
            $document->loadHTML($response->getContent());
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
            $xpath = new \DOMXPath($document);
            $assets = $xpath->query('//img[@src] | //script[@src] | //link[@rel="stylesheet"] | //*[@data-setbg]');
            foreach ($assets as $asset) {
                $src = $asset->getAttribute('src') ?: ($asset->getAttribute('href') ?: $asset->getAttribute('data-setbg'));
                $host = parse_url($src, PHP_URL_HOST);
                if (str_starts_with($src, 'data:') || ($host && $host !== parse_url(url('/'), PHP_URL_HOST))) {
                    continue;
                }
                $path = rawurldecode(ltrim(parse_url($src, PHP_URL_PATH), '/'));
                if (str_starts_with($path, 'livewire/')) {
                    $this->get($src)->assertOk();
                    continue;
                }
                $this->assertPublicFileHasExactCase($path);
            }
        }
    }

    public function test_invoice_loa_and_receipt_still_embed_their_images(): void
    {
        $data = ['full_name' => 'Asset Test Presenter', 'institution' => 'Test University',
            'abstractTitle' => 'Asset migration verification', 'email' => 'assets@example.test',
            'fee' => 'IDR 500,000', 'participant_type' => 'General Presenter',
            'receipt_no' => 'TEST-001', 'payment_for' => 'Conference registration', 'date' => '02 November 2026'];
        foreach (['invoice', 'loa', 'receipt'] as $template) {
            $pdf = app('dompdf.wrapper')->loadView('administrator.pdf.'.$template, $data)->setPaper('a4');
            $content = $pdf->output();
            $this->assertStringStartsWith('%PDF-', $content);
            $this->assertGreaterThanOrEqual(3, preg_match_all('#/Subtype\s*/Image#', $content), $template.' lost an embedded image.');
        }
    }
}
