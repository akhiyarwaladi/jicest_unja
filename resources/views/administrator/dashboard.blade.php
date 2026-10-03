@extends('layouts.administrator')

@section('css')
    @parent
    <style>
        .admin-dashboard-header {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 28px;
        }
        .admin-dashboard-header h1 {
            margin: 0;
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(30px, 4vw, 42px);
            font-weight: 500;
            letter-spacing: -.03em;
        }
        .admin-dashboard-header p {
            margin: 0;
            color: var(--ed-ink-70);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 13px;
        }
        .admin-queue-list { border-top: 1px solid var(--ed-ink); }
        .admin-queue {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            align-items: center;
            gap: 20px;
            min-height: 94px;
            padding: 22px 0;
            border-bottom: 1px solid var(--ed-hair);
            color: var(--ed-ink);
            text-decoration: none;
            transition: color .2s ease;
        }
        .admin-queue:hover { color: var(--ed-accent); text-decoration: none; }
        .admin-queue:focus-visible { outline: 2px solid var(--ed-accent); outline-offset: 4px; }
        .admin-queue h2 {
            margin: 0;
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(20px, 3vw, 26px);
            font-weight: 500;
            color: inherit;
        }
        .admin-queue p { margin: 5px 0 0; color: var(--ed-ink-70); font-size: 13px; }
        .admin-queue-count {
            color: var(--ed-accent);
            font-family: 'IBM Plex Mono', monospace;
            font-size: clamp(26px, 4vw, 36px);
            font-variant-numeric: tabular-nums;
        }
        @media (max-width: 600px) {
            .admin-dashboard-header { margin-bottom: 20px; }
            .admin-queue { min-height: 80px; padding: 18px 0; }
        }
    </style>
@endsection

@section('content-dashboard')
    <header class="admin-dashboard-header">
        <h1>Dashboard</h1>
        <p>{{ $conferenceYear }}</p>
    </header>
    <section class="admin-queue-list" aria-label="Conference activity for {{ $conferenceYear }}">
        @foreach ($queues as $queue)
            <a href="{{ url($queue['href']) }}" class="admin-queue">
                <div>
                    <h2>{{ $queue['label'] }}</h2>
                    <p>{{ $queue['status'] }}</p>
                </div>
                <span class="admin-queue-count">{{ number_format($queue['count']) }}</span>
            </a>
        @endforeach
    </section>
@endsection
