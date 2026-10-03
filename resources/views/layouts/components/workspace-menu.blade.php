@once
    <style>
        .workspace-menu > summary { display: none; }
        .workspace-menu > summary:focus-visible { outline: 2px solid #6ee7b7; outline-offset: 4px; }
        .workspace-menu nav a:focus-visible,
        .workspace-menu nav button:focus-visible { outline: 2px solid #6ee7b7; outline-offset: -3px; }
        .workspace-menu nav a.active:focus-visible { outline-color: var(--ed-accent); }
        @media (max-width: 960px) {
            .workspace-menu > summary {
                display: list-item;
                min-height: 44px;
                padding: 12px 0;
                color: #fff;
                font-family: 'IBM Plex Mono', monospace;
                font-size: 13px;
                list-style-position: inside;
                cursor: pointer;
            }
            .workspace-menu > nav { margin-top: 0; }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const desktop = window.matchMedia('(min-width: 961px)');
            document.querySelectorAll('.workspace-menu').forEach(function (menu) {
                const resizeMenu = function () { menu.open = desktop.matches; };
                resizeMenu();
                desktop.addEventListener('change', resizeMenu);
            });
        });
    </script>
@endonce

<details class="workspace-menu" open>
    <summary>{{ $menuLabel }}</summary>
    <nav class="{{ $navigationClass }}" aria-label="{{ $navigationLabel }}">
        @foreach ($navigation as $item)
            <a href="{{ $item['href'] }}" class="{{ $activeTitle === $item['title'] ? 'active' : '' }}"
                @if ($activeTitle === $item['title']) aria-current="page" @endif>
                {{ $item['label'] }}
            </a>
        @endforeach
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Sign out</button>
        </form>
    </nav>
</details>
