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

## Conference Details (2025)
- **Theme**: "Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society"
- **Date**: November 28, 2025
- **Format**: Online only
- **Sub-themes**:
  - Mathematical & Natural Sciences
  - Earth Sciences & Mining Technology
  - Civil, Chemical & Environmental Engineering
  - Electrical Engineering & Information Systems
  - Educational Technology

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

## UI/UX Design System (2025 Modernization)

### Design Philosophy
Modern, clean, and professional interface following 2024-2025 design trends with emphasis on:
- **Visual Hierarchy**: Clear content structure with consistent spacing
- **Micro-interactions**: Smooth hover effects and transitions
- **Responsive Design**: Mobile-first approach with breakpoints
- **Accessibility**: Semantic HTML and readable typography

### Color Palette
- **Primary**: Emerald (500-600) - Main CTAs and primary elements
- **Secondary**: Sky (500-600) - Supporting elements
- **Accent Colors**: Purple, Orange, Pink, Blue, Amber - Sub-theme differentiation
- **Neutral**: Gray scale for text and backgrounds

### Typography
- **Font Family**: Poppins (sans-serif)
- **Headings**: font-black (900 weight) for impact
- **Body**: Regular (400) and semibold (600)
- **Sizes**: text-4xl to text-6xl for hero headings
- **Special Effects**: Gradient text with bg-clip-text

### Component Standards

#### Cards
- **Border Radius**: rounded-2xl (16px) for all cards
- **Shadows**: shadow-lg (default), shadow-xl (hover), shadow-2xl (emphasis)
- **Padding**: p-6 to p-8 for card content
- **Borders**: border-l-4 or border-t-4 for color accents
- **Hover**: transform hover:-translate-y-1 or -translate-y-2

#### Icons
- **Source**: Heroicons (inline SVG)
- **Size**: w-6 h-6 (standard), w-7 h-7 (large)
- **Background**: Gradient backgrounds (from-{color}-400 to-{color}-600)
- **Container**: w-12 h-12 or w-14 h-14 rounded-xl with shadow

#### Buttons
- **Primary**: gradient-to-r from-emerald-500 to-emerald-600
- **Hover**: Enhanced gradient and shadow-xl
- **Transform**: hover:-translate-y-0.5 for lift effect
- **Icons**: Inline SVG with gap-2 spacing

#### Sections
- **Spacing**: py-20 for vertical section padding
- **Backgrounds**: Alternating white and gray-50/gradient backgrounds
- **Max Width**: max-w-5xl to max-w-7xl centered with mx-auto
- **Padding**: px-6 for horizontal spacing

### Page-Specific Implementations

#### Authentication Pages (Login/Register)
- **Layout**: Split-screen design (50/50)
- **Left Side**: Branding with animated gradient background, floating orbs, conference info
- **Right Side**: Form with white card on gray-50 background
- **Features**: Glassmorphism effects, backdrop-blur, responsive stacking

#### About Page
- **Hero**: Large logo, gradient title, conference highlights (3 cards)
- **Theme Section**: Highlighted card with icon for main theme
- **Sub-themes**: 2-column grid with 5 color-coded cards (last spans 2 cols)
- **Descriptions**: 5 stacked cards with gradient backgrounds and icons

#### Rundown Page
- **Hero**: Date badge with calendar icon, gradient title
- **Timeline**: Vertical line with alternating left/right cards
- **Nodes**: Circular colored dots that scale on hover
- **Cards**: 6 events with unique colors and icons
- **Mobile**: Left-aligned timeline, cards stack with left margin

#### Contact Page
- **Hero**: Standard hero with "Get In Touch" badge
- **Contact Persons**: 2-column grid with gradient cards and WhatsApp buttons
- **Info Cards**: Email and Website in 2-column grid with border-left accents
- **Map**: Large section with address info and embedded Google Maps

### Animation & Transitions
- **Duration**: duration-200 (buttons), duration-300 (cards/general)
- **Easing**: Default ease or ease-in-out
- **Hover Scale**: scale-105, scale-110, scale-150 (for small elements)
- **Translations**: -translate-y-0.5 to -translate-y-2
- **Opacity**: opacity-5 (backgrounds), opacity-10 (patterns)

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

## Recent Updates (January 2025)
### Frontend Modernization
- ✅ Redesigned authentication pages with split-screen layout
- ✅ Modernized About page with hero, stats, and enhanced sub-themes
- ✅ Transformed Rundown into visual timeline
- ✅ Enhanced Contact page with interactive WhatsApp integration
- ✅ Implemented consistent design system across all public pages
- ✅ Added micro-interactions and hover effects throughout
- ✅ Improved mobile responsiveness across all pages