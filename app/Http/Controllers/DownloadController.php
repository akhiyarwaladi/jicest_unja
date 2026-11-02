<?php

namespace App\Http\Controllers;

class DownloadController extends Controller
{
    private const ABSTRACT_TEMPLATE = 'uploads/downloads/2026/jicest-2026-abstract-template.docx';

    private const PAPER_TEMPLATE = 'uploads/downloads/2026/jicest-2026-full-paper-template.docx';

    private const PRESENTER_GUIDELINES = 'uploads/downloads/2026/jicest-2026-presenter-guidelines.pdf';

    public function downloadGuidebook()
    {
        return response()->download(public_path('uploads/downloads/archive/icics-2023-scientific-poster-guide.pdf'));
    }

    public function downloadAbstract()
    {
        return response()->download(public_path(self::ABSTRACT_TEMPLATE), 'jicest-2026-abstract-template.docx');
    }

    public function downloadPaper()
    {
        return response()->download(public_path(self::PAPER_TEMPLATE), 'jicest-2026-full-paper-template.docx');
    }

    public function downloadSchedule()
    {
        return view('homepage.oral-schedule', ['title' => 'Oral Presentation Schedule']);
    }

    public function downloadGuidelines()
    {
        return response()->download(public_path(self::PRESENTER_GUIDELINES), 'jicest-2026-presenter-guidelines.pdf');
    }
}
