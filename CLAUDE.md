# JICEST UNJA - Conference Management System

## Project Overview
JICEST UNJA is a comprehensive conference management system for the **Jambi International Conference on Engineering, Science, and Technology** hosted by Faculty of Science and Technology, Universitas Jambi.

## Technology Stack
- **Framework**: Laravel 10
- **Frontend**: Blade Templates + Tailwind CSS + Alpine.js
- **Database**: MySQL
- **Payment**: Manual verification system
- **PDF**: DomPDF for certificate generation
- **Real-time**: Livewire components

## Key Features
- **Conference Information**: Homepage with event details, speakers, schedule
- **User Registration**: Multi-role system (participant, presenter, administrator)
- **Abstract & Full-text Submission**: Upload and review system
- **Payment Management**: Receipt upload and verification
- **Certificate Generation**: Automated PDF certificates
- **Administrative Dashboard**: Complete conference management

## Project Structure
```
├── app/                # Application logic (Controllers, Models, Middleware)
├── config/            # Configuration files
├── database/          # Migrations, seeders, factories
├── public/           # Static assets (images, CSS, JS)
├── resources/        # Views, raw CSS/JS, localization
├── routes/           # Route definitions
├── storage/          # Application storage (logs, uploads)
└── tests/            # PHPUnit tests
```

## Important Pages
1. **Homepage** (`/`) - Conference information and registration
2. **About** (`/about`) - Detailed conference information
3. **Login/Register** - User authentication
4. **Dashboard** - User dashboard after login
5. **Participant Panel** - Abstract/paper submission and management
6. **Administrator Panel** - Complete conference management

## Key Models
- `User` - Authentication and user management
- `Participant` - Conference participants
- `UploadAbstract` - Abstract submissions
- `UploadFulltext` - Full-text paper submissions
- `Payment` - Payment tracking and verification

## Conference Details (2026)
- **Edition**: 4th
- **Theme**: "Accelerating Green Innovation and Digital Transformation in Science, Technology, and Engineering for a Sustainable Future"
- **Date**: 11 November 2026 (Wednesday)
- **Format**: Online only
- **Key dates**:
  - Abstract submission, early bird: 14 October 2026
  - Abstract & full paper, final round: 9 November 2026
  - Fee periods: Early bird 1 Aug – 14 Oct 2026 · Regular 15 Oct – 9 Nov 2026
- **Sub-themes** (6):
  - Mathematical & Natural Sciences
  - Earth Sciences & Mining Technology
  - Civil, Chemical & Environmental Engineering
  - Electrical Engineering & Information Systems
  - Educational Technology
  - Applied Science & Sustainable Innovation

## Contact Information
- **Email**: jicest@unja.ac.id
- **Website**: https://jicest.unja.ac.id
- **Contacts**:
  - Rara Ayu Lestary (+6282210794479)
  - Tia Wulandari (+6285266469829)

## Development Notes
- Uses Livewire for dynamic components
- Tailwind CSS for responsive design
- Manual payment verification system
- File uploads stored in `public/uploads/`
- Certificates generated via DomPDF

## UI/UX Design System (Editorial / Print-Inspired)

### Design Philosophy
The public pages follow a conference-proceedings aesthetic rather than a dashboard-SaaS one:
restrained typography, hairline rules and numbered rows instead of drop shadows, pill badges,
gradient chips and hover lift. The goal is a page that reads as though it was designed for a
university press, not assembled from a component library.

### Typography
- **Display / headings**: IBM Plex Serif (medium), tight letter-spacing, `.ed-display`
- **Metadata** (dates, fees, phone numbers, indices, eyebrows): IBM Plex Mono, tabular numerals, `.ed-mono`
- **Body**: Poppins (existing site default)
- Fonts are loaded once from `resources/views/assets/editorial.blade.php`

### Colour
Defined as CSS variables in `assets/editorial.blade.php`:
- `--ed-ink` `#0b1b14` — text and the single dark band
- `--ed-paper` `#fbfaf5` — warm off-white page background, faint printed grain
- `--ed-accent` `#047857` — one green accent, used sparingly
- `--ed-signal` `#a16207` — ochre, reserved for final-round urgency
- `--ed-hair` — 1px hairline rules

### Reusable Classes
- `.ed-paper` / `.ed-ink-band` — section backgrounds with a faint dot grain
- `.ed-row` — hairline-topped row with a soft hover wash (replaces card grids)
- `.ed-leader` — dotted leader tying a label to its value, as in a printed index
- `.ed-btn` / `.ed-btn-inverse` — flat, square, monospaced buttons (no gradients)
- `.ed-underline` — underline that grows from 0 to 100% on hover
- `.ed-media` — slightly desaturated image that resolves to colour on hover

### Applied To
- Homepage: countdown band, About/sub-themes index, Keynote speakers, Publication,
  Important dates, Registration fees, Location & contact
- `about-conference`, `rundown` (timetable), `contact`
- Auth branding panel (`layouts/guest.blade.php`)

### Implementation Notes

#### Cards vs. rows
Prefer hairline-separated rows over card grids. Where a card is genuinely needed, use a 1px
border (`border-[var(--ed-hair)]` / `.ed-hair`) and no drop shadow. Avoid the
`rounded-2xl + shadow-lg + hover:-translate-y-2` pattern entirely.

#### Icons
Inline Heroicons SVG remain in use across the dashboard and admin areas. Public pages should
not introduce new gradient-backed icon tiles; use monospaced index numbers (01, 02, ...) to
anchor a row instead.

#### Buttons
Use `.ed-btn` (ink) or `.ed-btn-inverse` (white on ink). Square corners, monospaced label,
uppercase, no gradient and no lift.

#### Sections
- Vertical rhythm: `py-20 md:py-24`
- Header pattern: `.ed-eyebrow` label, `.ed-display` heading, quiet supporting line
- Backgrounds alternate `bg-white` and `.ed-paper`, with at most one `.ed-ink-band` per page
- Containers: `max-w-4xl` / `max-w-5xl` / `max-w-6xl` with `px-6`

#### Page-Specific Implementations

##### Homepage
- `components/header`: full-height photograph, date badge, serif title, opening speakers
- Ink countdown band divided by vertical hairlines (figures clamp at zero)
- `components/about`: identity column plus a numbered six-track index
- `components/keynote`: portrait grid, muted images that resolve to colour on hover
- `components/publication`: single quiet colophon band with leader rows
- `components/date`: deadline table, early bird and final rounds, live countdowns
- `components/pricing`: fee prospectus on the ink band, periods read from the `fees` table
- Location & contact: secretariat leader rows, address, map in a hairline frame

##### About Page
- Masthead with three hairline statistics (edition, date, sub-theme count)
- Theme presented as a left-bordered pull-quote
- Sub-theme index, then long-form research domains as numbered articles

##### Rundown Page
- Printed timetable: monospaced time column, serif session titles, hairline rows

##### Contact Page
- Contact persons as leader rows with monospaced numbers and outline-style WhatsApp buttons
- Secretariat rows, venue address and a hairline-framed map

##### Authentication Pages
- Split screen retained; the branding panel is now `.ed-ink-band` with the logo, edition and
  sub-theme figures, replacing the animated gradient and floating orbs
- Form side unchanged (white card on gray-50)

### Animation & Transitions
- **Duration**: `.3s`–`.35s` on cubic-bezier(.4, 0, .2, 1)
- **Hover**: underline grow (`.ed-underline`), row wash (`.ed-row`), image saturation (`.ed-media`)
- **Avoided**: scale/lift transforms, bouncing icons, perpetual background motion
- `prefers-reduced-motion` disables all of the above

### Responsive Breakpoints
- **Mobile**: Default (< 768px) - single column, stacked layouts
- **Tablet**: md: (≥ 768px) - 2 columns, larger text
- **Desktop**: lg: (≥ 1024px) - full features, split screens, alternating layouts

### Accessibility Features
- **Semantic HTML**: Proper heading hierarchy (h1-h3)
- **Alt Text**: Images have descriptive alt attributes
- **Focus States**: focus:ring-2 focus:ring-{color}-500
- **Contrast**: WCAG AA compliant color combinations
- **Interactive Elements**: Clear hover/focus states

## Recent Updates (JICEST 2026 edition)
### Content rollover
- ✅ Conference moved to **11 November 2026**, theme updated to "Accelerating Green Innovation
  and Digital Transformation in Science, Technology, and Engineering for a Sustainable Future"
- ✅ Edition corrected to "The 4th" in LOA, acceptance emails and invoice
- ✅ Deadlines re-based on the new date: abstract early bird 14 Oct 2026, final round 9 Nov 2026
- ✅ `fees` table re-dated (early bird 1 Aug – 14 Oct 2026, regular 15 Oct – 9 Nov 2026) via
  migration `2026_08_01_000000_update_fees_for_jicest_2026` and the SQL dump
- ✅ Added `2026_08_01_000001_create_fees_table` — the table previously existed only in the SQL
  dump, so a fresh `php artisan migrate` broke the homepage ("Base table or view not found: fees").
  The new migration creates the table and seeds the 2026 tiers, and is a no-op where data exists.
- ✅ Voucher code rolled to `JICEST2026FST50RB`; admin `date_from` filters default to 2026-08-01
- ✅ Stale "JICEST 2023" export filenames corrected
- ✅ Created the missing `assets/img/jicest-logo-2026.png` and `uploads/JICEST_2026_Abstract_Template.docx`
  (PDFs and template downloads were 404-ing before this)

### Frontend redesign
- ✅ Added the editorial design system (`assets/editorial.blade.php`)
- ✅ Rebuilt homepage countdown, sub-themes, keynotes, publication, deadlines and fees
- ✅ Rebuilt the About, Rundown and Contact pages
- ✅ Reworked the auth branding panel

## Recent Updates (January 2025)
### Frontend Modernization
- ✅ Redesigned authentication pages with split-screen layout
- ✅ Modernized About page with hero, stats, and enhanced sub-themes
- ✅ Transformed Rundown into visual timeline
- ✅ Enhanced Contact page with interactive WhatsApp integration
- ✅ Implemented consistent design system across all public pages
- ✅ Added micro-interactions and hover effects throughout
- ✅ Improved mobile responsiveness across all pages