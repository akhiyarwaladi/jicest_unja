@extends('layouts.participant')

@section('css')
    @parent
    <style>
        .dashboard-overview {
            max-width: 1120px;
            margin: 0 auto;
        }

        .dashboard-intro {
            max-width: 760px;
            margin-bottom: 34px;
        }

        .dashboard-intro h1 {
            margin: 8px 0 0;
            color: var(--ed-ink);
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(34px, 5vw, 54px);
            font-weight: 500;
            letter-spacing: -.03em;
            line-height: 1.05;
        }

        .dashboard-intro p:last-child {
            max-width: 650px;
            margin: 16px 0 0;
            color: var(--ed-ink-70);
            font-size: 16px;
            line-height: 1.7;
        }

        .dashboard-ledger {
            display: grid;
            grid-template-columns: minmax(0, 1.35fr) minmax(260px, .65fr);
            gap: 20px;
        }

        .dashboard-panel {
            min-width: 0;
            padding: 26px;
            border: 1px solid var(--ed-hair);
            background: #fff;
        }

        .dashboard-panel--ink {
            border-color: var(--ed-ink);
            background: var(--ed-ink);
            color: #fff;
        }

        .dashboard-panel-label,
        .dashboard-record-label,
        .dashboard-status-label,
        .dashboard-template-label {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .dashboard-panel-label {
            color: #6ee7b7;
        }

        .dashboard-panel h2 {
            margin: 12px 0 0;
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(26px, 3vw, 38px);
            font-weight: 500;
            line-height: 1.12;
        }

        .dashboard-panel p:not(.dashboard-panel-label) {
            max-width: 560px;
            margin: 12px 0 0;
            color: rgba(255, 255, 255, .72);
            line-height: 1.7;
        }

        .dashboard-panel .ed-btn {
            margin-top: 24px;
        }

        .dashboard-account-panel h2 {
            color: var(--ed-ink);
            font-size: 25px;
        }

        .dashboard-account-panel p:not(.dashboard-panel-label) {
            color: var(--ed-ink-70);
        }

        .dashboard-account-list {
            margin: 22px 0 0;
            border-top: 1px solid var(--ed-hair);
        }

        .dashboard-account-row {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 16px;
            padding: 12px 0;
            border-bottom: 1px solid var(--ed-hair);
        }

        .dashboard-account-row dt {
            color: var(--ed-ink-70);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .dashboard-account-row dd {
            margin: 0;
            color: var(--ed-ink);
            font-size: 14px;
            text-align: right;
        }

        .dashboard-records {
            margin-top: 30px;
            border-top: 1px solid var(--ed-ink);
        }

        .dashboard-record {
            padding: 24px 0 0;
            border-bottom: 1px solid var(--ed-hair);
        }

        .dashboard-record + .dashboard-record {
            margin-top: 24px;
        }

        .dashboard-record-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
        }

        .dashboard-record-label {
            color: var(--ed-accent);
        }

        .dashboard-record h2 {
            max-width: 760px;
            margin: 8px 0 0;
            color: var(--ed-ink);
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(22px, 3vw, 30px);
            font-weight: 500;
            line-height: 1.2;
        }

        .dashboard-record-meta {
            margin: 10px 0 0;
            color: var(--ed-ink-70);
            font-size: 14px;
        }

        .dashboard-record-link {
            flex: 0 0 auto;
            color: var(--ed-accent);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            letter-spacing: .08em;
            text-transform: uppercase;
            text-decoration: underline;
            text-underline-offset: 4px;
        }

        .dashboard-status-list {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            margin-top: 22px;
            border-top: 1px solid var(--ed-hair);
        }

        .dashboard-status {
            min-width: 0;
            padding: 16px 16px 0 0;
            border-right: 1px solid var(--ed-hair);
        }

        .dashboard-status + .dashboard-status {
            padding-left: 16px;
        }

        .dashboard-status:last-child {
            border-right: 0;
        }

        .dashboard-status-label {
            color: var(--ed-ink-70);
        }

        .dashboard-status-value {
            margin: 8px 0 0;
            color: var(--ed-ink);
            font-size: 15px;
            font-weight: 600;
        }

        .dashboard-status-value--accepted {
            color: #047857;
        }

        .dashboard-status-value--attention {
            color: #b91c1c;
        }

        .dashboard-status-value--pending {
            color: #92400e;
        }

        .dashboard-empty {
            margin-top: 30px;
            padding: 30px 0;
            border-top: 1px solid var(--ed-ink);
            border-bottom: 1px solid var(--ed-hair);
        }

        .dashboard-empty h2 {
            margin: 8px 0 0;
            color: var(--ed-ink);
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: 28px;
            font-weight: 500;
        }

        .dashboard-empty p {
            max-width: 620px;
            margin: 10px 0 0;
            color: var(--ed-ink-70);
            line-height: 1.7;
        }

        .dashboard-empty .ed-btn {
            margin-top: 20px;
        }

        .dashboard-templates {
            margin-top: 34px;
            padding-top: 24px;
            border-top: 1px solid var(--ed-ink);
        }

        .dashboard-template-label {
            color: var(--ed-accent);
        }

        .dashboard-template-list {
            margin-top: 14px;
            border-top: 1px solid var(--ed-hair);
        }

        .dashboard-template-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            min-height: 62px;
            padding: 14px 0;
            border-bottom: 1px solid var(--ed-hair);
            color: var(--ed-ink);
            text-decoration: none;
            transition: color .3s ease, padding-left .3s ease;
        }

        .dashboard-template-link:hover {
            padding-left: 8px;
            color: var(--ed-accent);
        }

        .dashboard-template-link strong {
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: 20px;
            font-weight: 500;
        }

        .dashboard-template-link span {
            color: var(--ed-ink-70);
            font-size: 14px;
            text-align: right;
        }

        @media (max-width: 800px) {
            .dashboard-ledger {
                grid-template-columns: 1fr;
            }

            .dashboard-status-list {
                grid-template-columns: 1fr;
            }

            .dashboard-status,
            .dashboard-status + .dashboard-status {
                padding: 14px 0;
                border-right: 0;
                border-bottom: 1px solid var(--ed-hair);
            }

            .dashboard-status:last-child {
                border-bottom: 0;
            }
        }

        @media (max-width: 560px) {
            .dashboard-panel {
                padding: 22px 18px;
            }

            .dashboard-record-header,
            .dashboard-template-link {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }

            .dashboard-template-link span {
                text-align: left;
            }
        }
    </style>
@endsection

@section('content-dashboard')
    @php
        $participant = auth()->user()->participant;
        $participantType = $participant->participant_type;
        $isPresenter = in_array($participantType, ['presenter', 'presenter_reguler', 'presenter_student', 'professional presenter', 'student presenter'], true);
        $typeLabel = match ($participantType) {
            'presenter', 'presenter_reguler', 'professional presenter' => 'Presenter (Reguler)',
            'presenter_student' => 'Presenter (Student)',
            'participant', 'participant_reguler' => 'Participant (Reguler)',
            'participant_student' => 'Participant (Student)',
            default => 'Conference participant',
        };
        $statusLabel = function ($status) {
            return match (strtolower((string) $status)) {
                'accepted', 'valid' => 'Verified',
                'rejected', 'invalid' => 'Needs attention',
                'not yet reviewed', 'pending' => 'Pending review',
                '' => 'Not submitted',
                default => ucfirst(str_replace('_', ' ', (string) $status)),
            };
        };
        $statusTone = function ($status) {
            return match (strtolower((string) $status)) {
                'accepted', 'valid' => 'dashboard-status-value--accepted',
                'rejected', 'invalid' => 'dashboard-status-value--attention',
                'not yet reviewed', 'pending' => 'dashboard-status-value--pending',
                default => '',
            };
        };
    @endphp

    <div class="dashboard-overview">
        <header class="dashboard-intro">
            <p class="ed-eyebrow">JICEST 2026 account</p>
            <h1>{{ $isPresenter ? 'Presenter workspace' : 'Participant workspace' }}</h1>
            <p>Keep your conference record in one place. Review the current status of your submissions and take the next action when it is ready.</p>
        </header>

        <div class="dashboard-ledger">
            <section class="dashboard-panel dashboard-panel--ink">
                <p class="dashboard-panel-label">Next action</p>
                @if ($isPresenter)
                    <h2>{{ $participant->uploadAbstracts()->exists() ? 'Review your abstract record' : 'Submit your abstract' }}</h2>
                    <p>{{ $participant->uploadAbstracts()->exists() ? 'Open your submission list to edit the abstract, check the review status, or continue with payment and the full paper.' : 'Prepare your topic, authors, institutions, and abstract content before opening the submission form.' }}</p>
                    <a href="{{ url('/abstrak') }}" class="ed-btn ed-btn-inverse">{{ $participant->uploadAbstracts()->exists() ? 'Open submissions' : 'Submit Abstract' }}</a>
                @else
                    <h2>{{ $participant->payments()->exists() ? 'Check your payment record' : 'Complete your registration payment' }}</h2>
                    <p>{{ $participant->payments()->exists() ? 'Open the payment page to see the verification status and upload a replacement receipt if needed.' : 'Upload your transfer receipt and student card when applicable from the payment page.' }}</p>
                    <a href="{{ url('/payment') }}" class="ed-btn ed-btn-inverse">{{ $participant->payments()->exists() ? 'Open payment record' : 'Open Payment' }}</a>
                @endif
            </section>

            <section class="dashboard-panel dashboard-account-panel">
                <p class="dashboard-panel-label" style="color:var(--ed-accent)">Account record</p>
                <h2>{{ auth()->user()->name ?: auth()->user()->email }}</h2>
                <p>{{ auth()->user()->email }}</p>
                <dl class="dashboard-account-list">
                    <div class="dashboard-account-row">
                        <dt>Registration</dt>
                        <dd>{{ $typeLabel }}</dd>
                    </div>
                    <div class="dashboard-account-row">
                        <dt>Conference</dt>
                        <dd>JICEST 2026</dd>
                    </div>
                </dl>
            </section>
        </div>

        @if ($isPresenter)
            @php
                $abstracts = $participant->uploadAbstracts()->latest()->get();
            @endphp

            <section class="dashboard-records" aria-labelledby="abstract-records-title">
                <p class="dashboard-record-label" id="abstract-records-title">Abstract submissions</p>
                @forelse ($abstracts as $index => $abstract)
                    @php
                        $payment = $abstract->payments()->latest()->first();
                        $fulltext = $payment ? $payment->uploadFulltexts()->latest()->first() : null;
                    @endphp
                    <article class="dashboard-record">
                        <div class="dashboard-record-header">
                            <div>
                                <p class="dashboard-record-label">Submission {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</p>
                                <h2>{{ $abstract->title }}</h2>
                                <p class="dashboard-record-meta">Submitted {{ $abstract->created_at->format('d M Y') }}</p>
                            </div>
                            <a href="{{ url('/abstrak') }}" class="dashboard-record-link">Open abstract</a>
                        </div>
                        <div class="dashboard-status-list">
                            <div class="dashboard-status">
                                <p class="dashboard-status-label">Abstract</p>
                                <p class="dashboard-status-value {{ $statusTone($abstract->status) }}">{{ $statusLabel($abstract->status) }}</p>
                            </div>
                            <div class="dashboard-status">
                                <p class="dashboard-status-label">Payment</p>
                                <p class="dashboard-status-value {{ $statusTone($payment?->validation) }}">{{ $statusLabel($payment?->validation) }}</p>
                            </div>
                            <div class="dashboard-status">
                                <p class="dashboard-status-label">Full paper</p>
                                <p class="dashboard-status-value {{ $statusTone($fulltext?->validation) }}">{{ $statusLabel($fulltext?->validation) }}</p>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="dashboard-empty">
                        <p class="dashboard-record-label">No abstract submissions</p>
                        <h2>Start with your abstract</h2>
                        <p>Your saved abstract and its review status will appear here after you submit it.</p>
                        <a href="{{ url('/abstrak') }}" class="ed-btn">Submit Abstract</a>
                    </div>
                @endforelse
            </section>

            <section class="dashboard-templates" aria-labelledby="template-title">
                <p class="dashboard-template-label" id="template-title">Submission templates</p>
                <div class="dashboard-template-list">
                    <a href="{{ route('downloads.abstract') }}" class="dashboard-template-link">
                        <strong>Abstract Template</strong>
                        <span>Download the .docx template</span>
                    </a>
                    <a href="{{ route('downloads.paper') }}" class="dashboard-template-link">
                        <strong>Full Paper Template</strong>
                        <span>Download after acceptance</span>
                    </a>
                </div>
            </section>
        @else
            @php
                $payments = $participant->payments()->latest()->get();
            @endphp

            <section class="dashboard-records" aria-labelledby="payment-records-title">
                <p class="dashboard-record-label" id="payment-records-title">Payment records</p>
                @forelse ($payments as $index => $payment)
                    <article class="dashboard-record">
                        <div class="dashboard-record-header">
                            <div>
                                <p class="dashboard-record-label">Payment {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</p>
                                <h2>Conference registration</h2>
                                <p class="dashboard-record-meta">Uploaded {{ $payment->created_at->format('d M Y') }}</p>
                            </div>
                            <a href="{{ url('/payment') }}" class="dashboard-record-link">Open payment</a>
                        </div>
                        <div class="dashboard-status-list">
                            <div class="dashboard-status">
                                <p class="dashboard-status-label">Verification</p>
                                <p class="dashboard-status-value {{ $statusTone($payment->validation) }}">{{ $statusLabel($payment->validation) }}</p>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="dashboard-empty">
                        <p class="dashboard-record-label">No payment record</p>
                        <h2>Complete your registration</h2>
                        <p>Upload your payment receipt from the payment page. The secretariat will update the verification status here.</p>
                        <a href="{{ url('/payment') }}" class="ed-btn">Open Payment</a>
                    </div>
                @endforelse
            </section>
        @endif
    </div>
@endsection
