@extends('layouts.main')

@section('css')
    @include('assets.editorial')
    <style>
        body {
            background: var(--ed-paper);
            color: var(--ed-ink);
        }

        .workspace-skip {
            position: fixed;
            top: 12px;
            left: 12px;
            z-index: 10000;
            transform: translateY(-160%);
            padding: 12px 16px;
            background: var(--ed-ink);
            color: #fff;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 13px;
        }

        .workspace-skip:focus {
            transform: translateY(0);
        }

        .participant-shell {
            min-height: 70vh;
            padding: 190px 24px 80px;
        }

        .participant-frame {
            width: min(1320px, 100%);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 270px minmax(0, 1fr);
            border: 1px solid var(--ed-hair);
            background: #fff;
        }

        .participant-sidebar {
            background: var(--ed-ink);
            color: #fff;
            padding: 30px 20px;
        }

        .participant-kicker,
        .participant-account-label {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .participant-kicker {
            color: #6ee7b7;
        }

        .participant-sidebar h1 {
            margin: 10px 0 8px;
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: 28px;
            font-weight: 500;
            line-height: 1.15;
        }

        .participant-sidebar-copy,
        .participant-account-copy {
            color: rgba(255, 255, 255, .68);
            font-size: 14px;
            line-height: 1.6;
        }

        .participant-nav {
            display: grid;
            margin-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, .16);
        }

        .participant-nav a,
        .participant-nav button {
            width: 100%;
            min-height: 48px;
            display: flex;
            align-items: center;
            padding: 12px 10px;
            border: 0;
            border-bottom: 1px solid rgba(255, 255, 255, .16);
            background: transparent;
            color: rgba(255, 255, 255, .76);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px;
            letter-spacing: .05em;
            text-align: left;
            text-decoration: none;
            transition: background-color .3s ease, color .3s ease;
        }

        .participant-nav a:hover,
        .participant-nav button:hover {
            background: rgba(255, 255, 255, .08);
            color: #fff;
        }

        .participant-nav .active {
            background: #fff;
            color: var(--ed-ink);
        }

        .participant-account {
            margin-top: 32px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, .16);
        }

        .participant-account-label {
            color: #6ee7b7;
        }

        .participant-account-copy {
            margin: 6px 0 0;
            overflow-wrap: anywhere;
        }

        .participant-main {
            min-width: 0;
            background: #fff;
        }

        .participant-content {
            min-height: 620px;
            padding: 38px clamp(22px, 4vw, 52px) 52px;
        }

        .participant-content .section-title {
            margin: 0 0 30px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--ed-hair);
        }

        .participant-content .section-title h2,
        .participant-content .section-title h4,
        .participant-content .section-title h5 {
            margin: 0;
            color: var(--ed-ink);
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(26px, 3vw, 36px);
            font-weight: 500;
            letter-spacing: -.02em;
        }

        .participant-content .card,
        .participant-content .modal-content {
            border: 1px solid var(--ed-hair);
            border-radius: 0;
            box-shadow: none;
        }

        .participant-content .card-body {
            padding: 0;
        }

        .participant-content .form-control,
        .participant-content .custom-select {
            min-height: 46px;
            border: 1px solid var(--ed-hair);
            border-radius: 0;
            background-color: #fff;
            color: var(--ed-ink);
        }

        .participant-content .form-control:focus,
        .participant-content .custom-select:focus {
            border-color: var(--ed-accent);
            box-shadow: 0 0 0 2px rgba(4, 120, 87, .14);
            background-color: #fff;
            color: var(--ed-ink);
        }

        .participant-content label,
        .participant-content .form-label {
            color: var(--ed-ink);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: .05em;
        }

        .participant-content .btn {
            min-height: 44px;
            padding: .65rem 1rem;
            border-radius: 0;
            box-shadow: none;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: .06em;
            text-transform: uppercase;
        }

        .participant-content .btn-primary {
            border-color: var(--ed-ink);
            background: var(--ed-ink);
            color: #fff;
        }

        .participant-content .btn-primary:hover,
        .participant-content .btn-primary:focus {
            background: #fff;
            color: var(--ed-ink);
        }

        .participant-content .btn-warning,
        .participant-content .btn-info,
        .participant-content .btn-secondary {
            border-color: var(--ed-hair);
            background: var(--ed-paper);
            color: var(--ed-ink);
        }

        .participant-content .btn-danger {
            border-color: #b91c1c;
            background: #b91c1c;
            color: #fff;
        }

        .participant-content .alert {
            border: 1px solid var(--ed-hair);
            border-left: 3px solid var(--ed-accent);
            border-radius: 0;
            background: var(--ed-paper) !important;
            color: var(--ed-ink) !important;
            box-shadow: none;
        }

        .participant-content .alert * {
            color: inherit !important;
        }

        .participant-content .table {
            color: var(--ed-ink);
            background: #fff;
        }

        .participant-content .table thead th {
            border-bottom: 1px solid var(--ed-ink);
            color: var(--ed-ink);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .participant-content .table td,
        .participant-content .table th {
            border-top: 1px solid var(--ed-hair);
            vertical-align: middle;
        }

        .participant-content .modal-header,
        .participant-content .modal-footer {
            border-color: var(--ed-hair);
        }

        .abstract-heading {
            max-width: 760px;
            margin-bottom: 32px;
        }

        .abstract-heading h2 {
            margin: 8px 0 0;
            color: var(--ed-ink);
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(30px, 4vw, 44px);
            font-weight: 500;
            letter-spacing: -.02em;
            line-height: 1.1;
        }

        .abstract-heading > p:last-child {
            margin: 14px 0 0;
            color: var(--ed-ink-70);
            font-size: 16px;
            line-height: 1.7;
        }

        .abstract-form {
            padding-top: 28px;
            border-top: 1px solid var(--ed-hair);
        }

        .participant-content .abstract-form .form-group {
            margin-bottom: 24px;
        }

        .participant-content .abstract-form .form-control,
        .participant-content .abstract-form .custom-select {
            margin-top: 8px;
            padding: 12px 14px;
            font-size: 15px;
        }

        .participant-content .abstract-form textarea.form-control {
            line-height: 1.6;
        }

        .participant-error {
            margin: 8px 0 0;
            color: #b91c1c;
            font-size: 14px;
            font-weight: 500;
        }

        .abstract-actions,
        .abstract-list-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            padding-top: 24px;
            border-top: 1px solid var(--ed-hair);
        }

        .abstract-list-actions {
            margin-bottom: 28px;
        }

        .participant-loading {
            color: var(--ed-ink-70);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px;
        }

        .abstract-empty {
            padding: 34px 0;
            border-top: 1px solid var(--ed-hair);
            border-bottom: 1px solid var(--ed-hair);
        }

        .abstract-empty > .ed-mono {
            color: var(--ed-accent);
            font-size: 12px;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .abstract-empty h3 {
            margin: 12px 0 8px;
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: 26px;
            font-weight: 500;
        }

        .abstract-empty > p:last-child {
            max-width: 640px;
            margin: 0;
            color: var(--ed-ink-70);
            line-height: 1.7;
        }

        .abstract-table-wrap {
            border-top: 1px solid var(--ed-ink);
        }

        .participant-content .abstract-table {
            min-width: 860px;
            margin: 0;
        }

        .participant-content .abstract-table td:first-child {
            width: 64px;
            font-family: 'IBM Plex Mono', monospace;
        }

        .participant-content .abstract-table td:nth-child(2) {
            min-width: 300px;
        }

        .participant-content .abstract-table strong,
        .abstract-topic {
            display: block;
        }

        .abstract-topic {
            margin-top: 5px;
            color: var(--ed-ink-70);
            font-size: 13px;
        }

        .document-links {
            display: grid;
            gap: 8px;
            font-size: 13px;
        }

        .document-links a {
            color: var(--ed-accent);
            font-weight: 500;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .document-links span {
            color: var(--ed-ink-70);
        }

        .participant-content .form-control-file {
            width: 100%;
            min-height: 48px;
            padding: 10px;
            border: 1px solid var(--ed-hair);
            border-radius: 0;
            background: var(--ed-paper);
            color: var(--ed-ink);
        }

        .participant-content .form-control-file::file-selector-button {
            margin-right: 14px;
            padding: 8px 12px;
            border: 1px solid var(--ed-ink);
            border-radius: 0;
            background: var(--ed-ink);
            color: #fff;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            letter-spacing: .06em;
            text-transform: uppercase;
            cursor: pointer;
        }

        .participant-help {
            margin: 8px 0 0;
            color: var(--ed-ink-70);
            font-size: 13px;
        }

        .paper-format-note,
        .current-document {
            margin-bottom: 26px;
            padding: 20px 0;
            border-top: 1px solid var(--ed-hair);
            border-bottom: 1px solid var(--ed-hair);
        }

        .paper-format-note > p:first-child,
        .current-document p {
            color: var(--ed-accent);
            font-size: 12px;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .paper-format-note > p:last-child {
            margin: 8px 0 0;
            color: var(--ed-ink-70);
            line-height: 1.7;
        }

        .current-document a {
            display: inline-block;
            margin-top: 8px;
            color: var(--ed-accent);
            font-weight: 500;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        @media (max-width: 960px) {
            .participant-shell {
                padding: 130px 18px 56px;
            }

            .participant-frame {
                grid-template-columns: 1fr;
            }

            .participant-nav {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .participant-nav a,
            .participant-nav button {
                padding-inline: 14px;
            }

            .participant-content {
                min-height: 480px;
            }
        }

        @media (max-width: 600px) {
            .participant-nav {
                grid-template-columns: 1fr;
            }

            .participant-sidebar {
                padding: 24px 18px;
            }

            .participant-content {
                padding: 28px 18px 38px;
            }
        }
    </style>
@endsection

@section('content')
    <a class="workspace-skip" href="#participant-workspace">Skip to content</a>

    @php
        $activeTitle = $title ?? '';
        $participantType = auth()->user()->participant->participant_type;
        $isPresenter = in_array($participantType, ['presenter', 'presenter_reguler', 'presenter_student'], true);
        $navigation = [
            ['title' => 'Dashboard', 'label' => 'Dashboard', 'href' => '/dashboard'],
        ];

        if ($isPresenter) {
            $navigation[] = ['title' => 'Submit Abstract', 'label' => 'Submit Abstract', 'href' => '/abstrak'];
        }

        $navigation[] = ['title' => 'Payment', 'label' => 'Payment', 'href' => '/payment'];

        if ($isPresenter) {
            $navigation[] = ['title' => 'Submit Full Paper', 'label' => 'Submit Full Paper', 'href' => '/upload-fulltext'];
        }

        $navigation[] = ['title' => 'My Profile', 'label' => 'Profile', 'href' => '/profile'];
        $navigation[] = ['title' => 'Change Password', 'label' => 'Change Password', 'href' => '/change-password'];
    @endphp

    <main class="participant-shell">
        <div class="participant-frame">
            <aside class="participant-sidebar">
                <p class="participant-kicker">JICEST 2026</p>
                <h1>My conference account</h1>
                <p class="participant-sidebar-copy">Submit work, complete payment, and track review status from one account.</p>

                <nav class="participant-nav" aria-label="Participant navigation">
                    @foreach ($navigation as $item)
                        <a href="{{ $item['href'] }}" class="{{ $activeTitle === $item['title'] ? 'active' : '' }}"
                            @if ($activeTitle === $item['title']) aria-current="page" @endif>
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Sign Out</button>
                    </form>
                </nav>

                <div class="participant-account">
                    <p class="participant-account-label">Signed in as</p>
                    <p class="participant-account-copy">{{ auth()->user()->name }}<br>{{ auth()->user()->email }}</p>
                </div>
            </aside>

            <section class="participant-main" id="participant-workspace" aria-label="Participant workspace">
                <div class="participant-content">
                    @yield('content-dashboard')
                </div>
            </section>
        </div>
    </main>
@endsection
