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

        .admin-shell {
            min-height: 70vh;
            padding: 190px 24px 80px;
        }

        .admin-frame {
            width: min(1440px, 100%);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 280px minmax(0, 1fr);
            border: 1px solid var(--ed-hair);
            background: #fff;
        }

        .admin-sidebar {
            background: var(--ed-ink);
            color: #fff;
            padding: 30px 20px;
        }

        .admin-kicker,
        .admin-account-label,
        .admin-section-label {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .admin-kicker {
            color: #6ee7b7;
        }

        .admin-sidebar h1 {
            margin: 10px 0 8px;
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: 28px;
            font-weight: 500;
            line-height: 1.15;
        }

        .admin-sidebar-copy,
        .admin-account-copy {
            color: rgba(255, 255, 255, .68);
            font-size: 14px;
            line-height: 1.6;
        }

        .admin-nav {
            display: grid;
            margin-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, .16);
        }

        .admin-nav a,
        .admin-nav button {
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
            letter-spacing: .06em;
            text-align: left;
            text-decoration: none;
            transition: background-color .3s ease, color .3s ease;
        }

        .admin-nav a:hover,
        .admin-nav button:hover {
            background: rgba(255, 255, 255, .08);
            color: #fff;
        }

        .admin-nav .active {
            background: #fff;
            color: var(--ed-ink);
        }

        .admin-account {
            margin-top: 32px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, .16);
        }

        .admin-account-label {
            color: #6ee7b7;
        }

        .admin-account-copy {
            margin: 6px 0 0;
            overflow-wrap: anywhere;
        }

        .admin-main {
            min-width: 0;
            background: #fff;
        }

        .admin-content {
            min-height: 620px;
            padding: 38px clamp(22px, 4vw, 52px) 52px;
        }

        .admin-content .section-title {
            margin: 0 0 30px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--ed-hair);
        }

        .admin-content .section-title h4,
        .admin-content .section-title h5 {
            margin: 0;
            color: var(--ed-ink);
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-size: clamp(26px, 3vw, 36px);
            font-weight: 500;
            letter-spacing: -.02em;
        }

        .admin-content .card,
        .admin-content .modal-content {
            border: 1px solid var(--ed-hair);
            border-radius: 0;
            box-shadow: none;
        }

        .admin-content .card-body {
            padding: 0;
        }

        .admin-content .form-control,
        .admin-content .custom-select,
        .admin-content .form-group > label,
        .admin-content .modal-body .form-control {
            border-radius: 0;
        }

        .admin-content .form-control,
        .admin-content .custom-select {
            min-height: 46px;
            border: 1px solid var(--ed-hair);
            color: var(--ed-ink);
            background-color: #fff;
        }

        .admin-content .form-control:focus,
        .admin-content .custom-select:focus {
            border-color: var(--ed-accent);
            box-shadow: 0 0 0 2px rgba(4, 120, 87, .14);
        }

        .admin-content label {
            color: var(--ed-ink);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: .05em;
        }

        .admin-content .btn {
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

        .admin-content .btn-primary {
            border-color: var(--ed-ink);
            background: var(--ed-ink);
            color: #fff;
        }

        .admin-content .btn-primary:hover,
        .admin-content .btn-primary:focus {
            background: #fff;
            color: var(--ed-ink);
        }

        .admin-content .btn-success {
            border-color: var(--ed-accent);
            background: var(--ed-accent);
            color: #fff;
        }

        .admin-content .btn-warning,
        .admin-content .btn-info,
        .admin-content .btn-secondary {
            border-color: var(--ed-hair);
            background: var(--ed-paper);
            color: var(--ed-ink);
        }

        .admin-content .btn-danger {
            border-color: #b91c1c;
            background: #b91c1c;
            color: #fff;
        }

        .admin-content .alert {
            border: 1px solid var(--ed-hair);
            border-left: 3px solid var(--ed-accent);
            border-radius: 0;
            background: var(--ed-paper) !important;
            color: var(--ed-ink) !important;
            box-shadow: none;
        }

        .admin-content .alert * {
            color: inherit !important;
        }

        .admin-content .table {
            color: var(--ed-ink);
            background: #fff;
        }

        .admin-content .table thead th {
            border-bottom: 1px solid var(--ed-ink);
            color: var(--ed-ink);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .admin-content .table td,
        .admin-content .table th {
            border-top: 1px solid var(--ed-hair);
            vertical-align: middle;
        }

        .admin-content .table-hover tbody tr:hover {
            background: var(--ed-paper);
            color: var(--ed-ink);
        }

        .admin-content .modal-header,
        .admin-content .modal-footer {
            border-color: var(--ed-hair);
        }

        .admin-content .modal-title {
            font-family: 'IBM Plex Serif', Georgia, serif;
            font-weight: 500;
        }

        .admin-content .pagination .page-link {
            border-radius: 0;
            color: var(--ed-ink);
        }

        .admin-content .pagination .active .page-link {
            border-color: var(--ed-ink);
            background: var(--ed-ink);
            color: #fff;
        }

        @media (max-width: 960px) {
            .admin-shell {
                padding: 130px 18px 56px;
            }

            .admin-frame {
                grid-template-columns: 1fr;
            }

            .admin-nav {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .admin-nav a,
            .admin-nav button {
                padding-inline: 14px;
            }

            .admin-content {
                min-height: 480px;
            }
        }

        @media (max-width: 600px) {
            .admin-nav {
                grid-template-columns: 1fr;
            }

            .admin-sidebar {
                padding: 24px 18px;
            }

            .admin-content {
                padding: 28px 18px 38px;
            }
        }
    </style>
@endsection

@section('content')
    <a class="workspace-skip" href="#admin-workspace">Skip to content</a>

    @php
        $activeTitle = $title ?? '';
        $navigation = [
            ['title' => 'Dashboard', 'label' => 'Overview', 'href' => '/dashboard'],
            ['title' => 'Registered Participant', 'label' => 'Registered Users', 'href' => '/registered-participant'],
            ['title' => 'Review Submissions', 'label' => 'Review Submissions', 'href' => '/review-abstract'],
            ['title' => 'Verify Payments', 'label' => 'Verify Payments', 'href' => '/payment-validation'],
            ['title' => 'Full Paper Submissions', 'label' => 'Full Paper Submissions', 'href' => '/uploaded-paper'],
            ['title' => 'Presenter Payments', 'label' => 'Presenter Payments', 'href' => '/presenter-have-paid'],
            ['title' => 'Participant Payments', 'label' => 'Participant Payments', 'href' => '/participant-have-paid'],
            ['title' => 'Change Password', 'label' => 'Change Password', 'href' => '/change-password'],
        ];
    @endphp

    <main class="admin-shell">
        <div class="admin-frame">
            <aside class="admin-sidebar">
                <p class="admin-kicker">JICEST 2026</p>
                <h1>Conference administration</h1>
                <p class="admin-sidebar-copy">Review submissions, confirm payments, and manage participant records.</p>

                <nav class="admin-nav" aria-label="Administrator navigation">
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

                <div class="admin-account">
                    <p class="admin-account-label">Signed in as</p>
                    @php
                        $accountName = auth()->user()->name;
                        $accountEmail = auth()->user()->email;
                        $showAccountName = $accountName && $accountName !== $accountEmail;
                    @endphp
                    <p class="admin-account-copy">
                        @if ($showAccountName)
                            {{ $accountName }}<br>{{ $accountEmail }}
                        @else
                            {{ $accountEmail }}
                        @endif
                    </p>
                </div>
            </aside>

            <section class="admin-main" id="admin-workspace" aria-label="Administrator workspace">
                <div class="admin-content">
                    @yield('content-dashboard')
                </div>
            </section>
        </div>
    </main>
@endsection
