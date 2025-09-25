# Views Directory

## Overview
Contains all Blade template files for the JICEST conference management system, organized by functionality and user roles.

## Directory Structure
```
├── administrator/    # Admin panel interfaces
├── auth/            # Authentication pages
├── components/      # Reusable view components
├── homepage/        # Public conference website
├── homepage-backup/ # Backup files
├── layouts/         # Base layout templates
├── livewire/        # Livewire component templates
├── mail/            # Email templates
├── participant/     # Participant dashboard
├── profile/         # User profile management
└── templates/       # Common UI components
```

## Public Homepage (`homepage/`)
Conference website for visitors and potential participants:

### Main Pages
- **index.blade.php**: Landing page with conference overview, countdown, key information
- **about.blade.php**: Detailed conference description, theme, sub-themes
- **contact.blade.php**: Contact information and inquiry form
- **registration-fee.blade.php**: Pricing structure and payment information
- **rundown.blade.php**: Conference schedule and timeline

### Components (`homepage/components/`)
- **header.blade.php**: Main hero section with conference title and speakers
- **about.blade.php**: Conference overview and sub-theme information
- **date.blade.php**: Important dates with countdown timers
- **pricing.blade.php**: Ticket pricing for different categories
- **keynote.blade.php**: Keynote speaker information
- **icon-jambi.blade.php**: Local branding and cultural elements

## Authentication (`auth/`)
User authentication and account management:
- Login and registration forms
- Password reset workflow
- Email verification pages
- Account activation

## Administrative Interface (`administrator/`)
Conference management dashboard:
- Participant management and verification
- Payment approval system
- Abstract and paper review interface
- Statistical reports and analytics
- Certificate generation tools

## Participant Dashboard (`participant/`)
User interface for conference participants:
- Personal profile management
- Abstract submission forms
- Full-text paper upload
- Payment status tracking
- Certificate download area

## Layout System (`layouts/`)
Base templates providing consistent structure:
- **main-tailwind.blade.php**: Primary layout with Tailwind CSS
- Navigation components
- Footer elements
- Meta tags and SEO optimization

## Email Templates (`mail/`)
Notification emails for various system events:
- Registration confirmations
- Payment verifications
- Submission status updates
- Administrative notifications

## UI Philosophy
- **Clean Design**: Minimal, professional appearance
- **Responsive Layout**: Mobile-first approach with Tailwind CSS
- **Consistent Branding**: University and conference colors/logos
- **User Experience**: Intuitive navigation and clear information hierarchy
- **Accessibility**: Semantic HTML and ARIA support

## Conference Theme Integration
- **2025 Theme**: "Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society"
- **Visual Elements**: Sky blue gradients, modern typography
- **Content Structure**: Clear information hierarchy for academic conference
- **Interactive Elements**: Countdown timers, dynamic forms, real-time updates

## Technical Implementation
- **Blade Templating**: Laravel's templating engine
- **Component System**: Reusable UI components
- **Tailwind CSS**: Utility-first CSS framework
- **Alpine.js**: Lightweight JavaScript framework
- **Livewire Integration**: Real-time component updates

## Content Management
- **Dynamic Content**: Database-driven content where appropriate
- **Static Content**: Hard-coded conference information
- **Multi-language Ready**: Structure supports internationalization
- **SEO Optimized**: Meta descriptions, structured data, clean URLs