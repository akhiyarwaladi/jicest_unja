@extends('layouts.administrator')

@section('css')
    @parent
    <style>
        .admin-dashboard-intro {
            max-width: 760px;
            margin-bottom: 34px;
        }

        .admin-dashboard-intro h1 {
            margin: 8px 0 0;
            color: var(--ed-ink);
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(34px, 5vw, 54px);
            font-weight: 500;
            letter-spacing: -.03em;
            line-height: 1.05;
        }

        .admin-dashboard-intro p:last-child {
            max-width: 650px;
            margin: 16px 0 0;
            color: var(--ed-ink-70);
            font-size: 16px;
            line-height: 1.7;
        }

        .admin-desk {
            border-top: 1px solid var(--ed-ink);
        }

        .admin-desk-label {
            padding: 18px 0 14px;
            color: var(--ed-accent);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .admin-desk-link {
            display: grid;
            grid-template-columns: 54px minmax(0, 1fr) auto;
            align-items: center;
            gap: 18px;
            min-height: 82px;
            padding: 18px 0;
            border-top: 1px solid var(--ed-hair);
            color: var(--ed-ink);
            text-decoration: none;
            transition: padding-left .3s ease, color .3s ease;
        }

        .admin-desk-link:last-child {
            border-bottom: 1px solid var(--ed-hair);
        }

        .admin-desk-link:hover {
            padding-left: 10px;
            color: var(--ed-accent);
        }

        .admin-desk-index {
            color: var(--ed-ink-70);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px;
        }

        .admin-desk-copy strong,
        .admin-desk-copy span {
            display: block;
        }

        .admin-desk-copy strong {
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: 24px;
            font-weight: 500;
        }

        .admin-desk-copy span {
            margin-top: 5px;
            color: var(--ed-ink-70);
            font-size: 14px;
        }

        .admin-desk-action {
            color: var(--ed-accent);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .admin-dashboard-note {
            max-width: 650px;
            margin: 28px 0 0;
            color: var(--ed-ink-70);
            font-size: 15px;
            line-height: 1.7;
        }

        @media (max-width: 560px) {
            .admin-desk-link {
                grid-template-columns: 36px minmax(0, 1fr);
                gap: 12px;
            }

            .admin-desk-action {
                grid-column: 2;
            }
        }
    </style>
@endsection

@section('content-dashboard')
    <div class="admin-dashboard">
        <header class="admin-dashboard-intro">
            <p class="ed-eyebrow">Operations desk</p>
            <h1>Administration desk</h1>
            <p>Signed in as {{ auth()->user()->name ?: auth()->user()->email }}. Choose a work queue to review the next conference task.</p>
        </header>

        <section class="admin-desk" aria-labelledby="admin-work-queues">
            <p class="admin-desk-label" id="admin-work-queues">Work queues</p>
            <a href="{{ url('/review-abstract') }}" class="admin-desk-link">
                <span class="admin-desk-index">01</span>
                <span class="admin-desk-copy">
                    <strong>Review submissions</strong>
                    <span>Read abstracts and record accept or reject decisions.</span>
                </span>
                <span class="admin-desk-action">Open queue</span>
            </a>
            <a href="{{ url('/payment-validation') }}" class="admin-desk-link">
                <span class="admin-desk-index">02</span>
                <span class="admin-desk-copy">
                    <strong>Verify payments</strong>
                    <span>Check receipts and confirm participant payments.</span>
                </span>
                <span class="admin-desk-action">Open queue</span>
            </a>
            <a href="{{ url('/uploaded-paper') }}" class="admin-desk-link">
                <span class="admin-desk-index">03</span>
                <span class="admin-desk-copy">
                    <strong>Full paper submissions</strong>
                    <span>Review uploaded papers and update their validation status.</span>
                </span>
                <span class="admin-desk-action">Open queue</span>
            </a>
            <a href="{{ url('/registered-participant') }}" class="admin-desk-link">
                <span class="admin-desk-index">04</span>
                <span class="admin-desk-copy">
                    <strong>Registered users</strong>
                    <span>Review participant records and account status.</span>
                </span>
                <span class="admin-desk-action">Open register</span>
            </a>
        </section>

        <p class="admin-dashboard-note">Use the navigation for payment lists, participant records, and account settings.</p>
    </div>
@endsection
