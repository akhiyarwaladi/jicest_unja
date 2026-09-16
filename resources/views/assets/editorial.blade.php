{{--
    Editorial design system for the JICEST public pages.

    Direction: conference-proceedings / university-press print, not dashboard SaaS.
    - serif display type (IBM Plex Serif) against the existing Poppins body text
    - monospace (IBM Plex Mono) for metadata: dates, fees, phone numbers, indices
    - hairline rules and numbered rows instead of drop shadows, pills and gradient chips
    - one green accent on warm paper; deep ink used for a single dramatic band

    Loaded once from layouts/main-tailwind.blade.php. Components consume the .ed-* classes.
--}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Serif:ital,wght@0,400;0,500;0,600;1,400&display=swap"
    rel="stylesheet">

<style>
    :root {
        --ed-ink: #0b1b14;
        --ed-ink-70: rgba(11, 27, 20, .70);
        --ed-ink-45: rgba(11, 27, 20, .45);
        --ed-hair: rgba(11, 27, 20, .14);
        --ed-paper: #fbfaf5;
        --ed-accent: #047857;
        --ed-signal: #a16207;
    }

    /* === TYPOGRAPHY === */
    .ed-display {
        font-family: 'IBM Plex Serif', Georgia, 'Times New Roman', serif;
        font-weight: 500;
        letter-spacing: -.02em;
        line-height: 1.1;
        color: var(--ed-ink);
        font-optical-sizing: auto;
        text-wrap: balance;
    }

    .ed-mono {
        font-family: 'IBM Plex Mono', ui-monospace, SFMono-Regular, Menlo, monospace;
        font-variant-numeric: tabular-nums;
    }

    .ed-eyebrow {
        font-family: 'IBM Plex Mono', ui-monospace, monospace;
        font-size: .75rem;
        font-weight: 500;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: var(--ed-accent);
    }

    .ed-quiet {
        color: var(--ed-ink-70);
    }

    /* Paragraphs break without orphans; progressive enhancement, ignored by old browsers. */
    p {
        text-wrap: pretty;
    }

    /* A printed-proceedings selection colour instead of the browser default blue. */
    ::selection {
        background-color: var(--ed-accent);
        color: var(--ed-paper);
    }

    /* Keyboard focus: a hairline-friendly 2px accent outline. Mouse users never see it. */
    :focus-visible {
        outline: 2px solid var(--ed-accent);
        outline-offset: 3px;
    }

    .ed-ink-band :focus-visible,
    header :focus-visible {
        outline-color: #6ee7b7;
    }

    /* === RULES AND ROWS === */
    .ed-hair {
        border: 0;
        border-top: 1px solid var(--ed-hair);
    }

    .ed-row {
        border-top: 1px solid var(--ed-hair);
        transition: background-color .35s cubic-bezier(.4, 0, .2, 1);
    }

    .ed-row:hover {
        background-image: linear-gradient(90deg, rgba(4, 120, 87, .05), rgba(4, 120, 87, 0) 70%);
    }

    /* Dotted leader that visually ties a label to its value, as in a printed index. */
    .ed-leader {
        flex: 1 1 auto;
        min-width: 1.25rem;
        border-bottom: 1px dotted var(--ed-hair);
        transform: translateY(-.3em);
    }

    /* === INTERACTIONS (deliberately subtle) === */
    .ed-underline {
        background-image: linear-gradient(currentColor, currentColor);
        background-repeat: no-repeat;
        background-size: 0 1px;
        background-position: 0 100%;
        transition: background-size .35s cubic-bezier(.4, 0, .2, 1);
    }

    .ed-underline:hover {
        background-size: 100% 1px;
    }

    .ed-media {
        filter: saturate(.68) contrast(1.03);
        transition: filter .5s ease, transform .7s cubic-bezier(.4, 0, .2, 1);
    }

    .ed-media:hover {
        filter: none;
        transform: scale(1.025);
    }

    /* Ink-coloured action. Flat, square-ish, no gradient, no lift. */
    .ed-btn {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        padding: .8rem 1.4rem;
        background: var(--ed-ink);
        color: #fff;
        font-family: 'IBM Plex Mono', monospace;
        font-size: .8125rem;
        font-weight: 500;
        letter-spacing: .12em;
        text-transform: uppercase;
        border: 1px solid var(--ed-ink);
        transition: background-color .3s ease, color .3s ease;
    }

    .ed-btn:hover {
        background: transparent;
        color: var(--ed-ink);
    }

    .ed-btn-inverse {
        background: #fff;
        color: var(--ed-ink);
        border-color: #fff;
    }

    .ed-btn-inverse:hover {
        background: transparent;
        color: #fff;
    }

    /* Warm paper with a faint printed grain, used instead of gradient meshes. */
    .ed-paper {
        background-color: var(--ed-paper);
        background-image: radial-gradient(rgba(11, 27, 20, .055) 1px, transparent 0);
        background-size: 22px 22px;
    }

    .ed-ink-band {
        background-color: var(--ed-ink);
        background-image: radial-gradient(rgba(255, 255, 255, .06) 1px, transparent 0);
        background-size: 22px 22px;
    }

    @media (prefers-reduced-motion: reduce) {

        .ed-media,
        .ed-underline,
        .ed-row,
        .ed-btn {
            transition: none;
        }

        .ed-media:hover {
            transform: none;
        }
    }

    /* === PRINT ===
       The page is styled as a printed proceedings; printing it should return to
       plain ink on white: no photographs, no dot grain, no live countdowns. */
    @media print {
        body {
            background: #fff;
        }

        .ed-paper,
        .ed-paper *,
        .ed-ink-band,
        .ed-ink-band * {
            background: transparent !important;
            background-image: none !important;
        }

        .ed-ink-band,
        .ed-ink-band * {
            color: var(--ed-ink) !important;
            border-color: var(--ed-hair) !important;
        }

        header {
            background: #fff !important;
        }

        header > img,
        header div[style*="linear-gradient"],
        nav,
        #hero-countdown,
        [id^="countdown-"] {
            display: none !important;
        }

        header,
        header * {
            color: var(--ed-ink) !important;
        }

        a {
            text-decoration: underline;
        }
    }
</style>
