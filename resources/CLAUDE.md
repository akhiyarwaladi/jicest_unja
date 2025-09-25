# Resources Directory

## Overview
Contains all frontend resources including views, stylesheets, JavaScript, and other assets for the JICEST conference website.

## Structure
```
├── css/              # Raw CSS files for compilation
├── js/               # Raw JavaScript files for compilation
└── views/            # Blade templates and view components
    ├── administrator/    # Admin panel views
    ├── auth/            # Authentication views
    ├── components/      # Reusable view components
    ├── homepage/        # Public homepage views
    ├── homepage-backup/ # Backup homepage files
    ├── layouts/         # Base layout templates
    ├── livewire/        # Livewire component views
    ├── mail/            # Email template views
    ├── participant/     # Participant dashboard views
    ├── profile/         # User profile views
    └── templates/       # Common template components
```

## Key View Directories

### Homepage (`views/homepage/`)
Public-facing conference website:
- **index.blade.php**: Main landing page with conference overview
- **about.blade.php**: Detailed conference information
- **contact.blade.php**: Contact information and form
- **registration-fee.blade.php**: Pricing and payment details
- **rundown.blade.php**: Conference schedule
- **components/**: Modular homepage components (header, about, pricing, etc.)

### Administrator (`views/administrator/`)
Administrative dashboard:
- Participant management
- Payment verification
- Abstract/paper review
- Conference statistics
- PDF generation for certificates

### Participant (`views/participant/`)
Participant dashboard:
- Profile management
- Abstract submission
- Full-text paper upload
- Payment status tracking
- Certificate download

### Authentication (`views/auth/`)
User authentication flows:
- Login/register forms
- Password reset
- Email verification
- Account management

## Frontend Technology Stack
- **CSS Framework**: Tailwind CSS
- **JavaScript**: Alpine.js for interactive components
- **Template Engine**: Laravel Blade
- **Real-time Components**: Livewire
- **Build Tool**: Vite

## Conference Branding
- **Colors**: Sky blue gradient themes, orange accents
- **Typography**: Modern, professional fonts
- **Images**: Conference logos, speaker photos, venue images
- **Layout**: Responsive design with mobile-first approach

## Key Features Implemented
- **Responsive Design**: Mobile-friendly layouts
- **Interactive Components**: Dynamic forms and content
- **Multi-language Support**: Ready for internationalization
- **Accessibility**: Semantic HTML and ARIA attributes
- **SEO Optimization**: Meta tags and structured content

## Component Architecture
- **Modular Design**: Reusable components for consistent UI
- **Blade Components**: Server-side rendered components
- **Livewire Components**: Interactive, real-time components
- **Template Inheritance**: Base layouts with extending views

## Development Notes
- Uses Laravel Blade templating engine
- Implements Tailwind CSS utility classes
- Integrates Alpine.js for client-side interactivity
- Follows component-based architecture
- Optimized for performance and accessibility