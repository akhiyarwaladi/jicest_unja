@extends('layouts.participant')

@section('css')
    @parent
    <style>
        .dashboard-header { margin-bottom: 28px; }
        .dashboard-header h1 {
            margin: 0;
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(30px, 4vw, 42px);
            font-weight: 500;
            letter-spacing: -.03em;
        }
        .dashboard-header p { margin: 8px 0 0; color: var(--ed-ink-70); font-size: 14px; }
        .dashboard-section-header,
        .dashboard-record-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }
        .dashboard-section-header {
            padding: 18px 0;
            border-top: 1px solid var(--ed-ink);
            border-bottom: 1px solid var(--ed-hair);
        }
        .dashboard-section-header h2 {
            margin: 0;
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: 24px;
            font-weight: 500;
        }
        .dashboard-link {
            display: inline-flex;
            align-items: center;
            min-height: 44px;
            color: var(--ed-accent);
            font-size: 13px;
            font-weight: 500;
            text-decoration: underline;
            text-underline-offset: 4px;
        }
        .dashboard-link:focus-visible { outline: 2px solid var(--ed-accent); outline-offset: 4px; }
        .dashboard-record { padding: 24px 0; border-bottom: 1px solid var(--ed-hair); }
        .dashboard-record-header { align-items: flex-start; }
        .dashboard-record h3 {
            margin: 0;
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(20px, 3vw, 26px);
            font-weight: 500;
            line-height: 1.3;
            overflow-wrap: anywhere;
        }
        .dashboard-record-date { margin: 8px 0 0; color: var(--ed-ink-70); font-size: 13px; }
        .dashboard-record-header .dashboard-link { flex: 0 0 auto; }
        .dashboard-status-list {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin: 20px 0 0;
        }
        .dashboard-status-list dt { color: var(--ed-ink-70); font-size: 12px; font-weight: 400; }
        .dashboard-status-value { margin: 5px 0 0; font-size: 14px; font-weight: 500; }
        .dashboard-status-value--accepted { color: #047857; }
        .dashboard-status-value--attention { color: #b91c1c; }
        .dashboard-status-value--pending { color: #92400e; }
        .dashboard-empty { padding: 28px 0; }
        .dashboard-empty p { margin: 0 0 18px; color: var(--ed-ink-70); font-size: 14px; }
        .dashboard-payment {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            align-items: baseline;
            gap: 12px 20px;
            padding: 20px 0;
            border-bottom: 1px solid var(--ed-hair);
        }
        .dashboard-payment p,
        .dashboard-payment time { margin: 0; font-size: 14px; }
        .dashboard-payment-amount {
            grid-column: 1 / -1;
            color: var(--ed-ink-70);
            font-family: 'IBM Plex Mono', monospace;
            overflow-wrap: anywhere;
        }
        .dashboard-templates {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px 24px;
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid var(--ed-hair);
        }
        .dashboard-templates h2 { flex-basis: 100%; margin: 0; color: var(--ed-ink-70); font-size: 13px; font-weight: 400; }
        @media (max-width: 600px) {
            .dashboard-header { margin-bottom: 20px; }
            .dashboard-record-header { flex-direction: column; gap: 8px; }
            .dashboard-section-header { flex-wrap: wrap; gap: 8px; }
            .dashboard-status-list { grid-template-columns: 1fr; gap: 12px; }
            .dashboard-status-list > div { display: flex; justify-content: space-between; gap: 16px; }
            .dashboard-status-value { margin: 0; text-align: right; }
        }
    </style>
@endsection

@section('content-dashboard')
    @php
        $participant = auth()->user()->participant;
        $participantType = $participant->participant_type;
        $isPresenter = in_array($participantType, ['presenter', 'presenter_reguler', 'presenter_student', 'professional presenter', 'student presenter'], true);
        $typeLabel = match ($participantType) {
            'presenter', 'presenter_reguler', 'professional presenter' => 'General Presenter',
            'presenter_student', 'student presenter' => 'Student Presenter',
            'participant', 'participant_reguler' => 'General Participant',
            'participant_student' => 'Student Participant',
            default => 'Participant',
        };
        $statusLabel = fn ($status) => match (strtolower((string) $status)) {
            'accepted' => 'Accepted', 'valid' => 'Verified', 'rejected' => 'Rejected', 'invalid' => 'Invalid',
            'not yet reviewed', 'not yet validated', 'pending' => 'Pending',
            '' => 'Not submitted',
            default => ucfirst(str_replace('_', ' ', (string) $status)),
        };
        $statusTone = fn ($status) => match (strtolower((string) $status)) {
            'accepted', 'valid' => 'dashboard-status-value--accepted',
            'rejected', 'invalid' => 'dashboard-status-value--attention',
            'not yet reviewed', 'not yet validated', 'pending' => 'dashboard-status-value--pending',
            default => '',
        };
    @endphp

    <header class="dashboard-header">
        <h1>Dashboard</h1>
        <p>{{ $typeLabel }}</p>
    </header>

    @if ($isPresenter)
        @php
            $abstracts = $participant->uploadAbstracts()->with(['payments.uploadFulltexts'])->latest()->get();
        @endphp
        <section aria-labelledby="abstract-records-title">
            <header class="dashboard-section-header">
                <h2 id="abstract-records-title">Abstracts</h2>
                @if ($abstracts->isNotEmpty())
                    <a href="{{ url('/abstrak') }}" class="dashboard-link">Submit abstract</a>
                @endif
            </header>
            @forelse ($abstracts as $abstract)
                @php
                    $payment = $abstract->payments->sortByDesc('created_at')->first();
                    $fulltext = $payment?->uploadFulltexts->sortByDesc('created_at')->first();
                @endphp
                <article class="dashboard-record">
                    <div class="dashboard-record-header">
                        <div>
                            <h3>{{ $abstract->title }}</h3>
                            <p class="dashboard-record-date">{{ $abstract->created_at->format('d M Y') }}</p>
                        </div>
                        <a href="{{ url('/abstrak') }}" class="dashboard-link" aria-label="View abstract: {{ $abstract->title }}">View abstract</a>
                    </div>
                    <dl class="dashboard-status-list">
                        @foreach (['Abstract' => $abstract->status, 'Payment' => $payment?->validation, 'Full paper' => $fulltext?->validation] as $label => $status)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd class="dashboard-status-value {{ $statusTone($status) }}">{{ $statusLabel($status) }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </article>
            @empty
                <div class="dashboard-empty">
                    <p>No abstracts submitted.</p>
                    <a href="{{ url('/abstrak') }}" class="ed-btn">Submit abstract</a>
                </div>
            @endforelse
        </section>
        <section class="dashboard-templates" aria-labelledby="template-title">
            <h2 id="template-title">Templates</h2>
            <a href="{{ route('downloads.abstract') }}" class="dashboard-link">Abstract template</a>
            <a href="{{ route('downloads.paper') }}" class="dashboard-link">Full paper template</a>
        </section>
    @else
        @php
            $payments = $participant->payments()->latest()->get();
        @endphp
        <section aria-labelledby="payment-records-title">
            <header class="dashboard-section-header">
                <h2 id="payment-records-title">Payments</h2>
                @if ($payments->isNotEmpty())
                    <a href="{{ url('/payment') }}" class="dashboard-link">Manage payments</a>
                @endif
            </header>
            @forelse ($payments as $payment)
                <article class="dashboard-payment" aria-label="Payment uploaded {{ $payment->created_at->format('d M Y') }}">
                    <time datetime="{{ $payment->created_at->toDateString() }}">{{ $payment->created_at->format('d M Y') }}</time>
                    <p class="dashboard-status-value {{ $statusTone($payment->validation) }}">{{ $statusLabel($payment->validation) }}</p>
                    <p class="dashboard-payment-amount">{{ $payment->total_bill }}</p>
                </article>
            @empty
                <div class="dashboard-empty">
                    <p>No payments submitted.</p>
                    <a href="{{ url('/payment') }}" class="ed-btn">Add payment</a>
                </div>
            @endforelse
        </section>
    @endif
@endsection
