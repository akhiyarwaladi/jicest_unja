# Homepage Views Directory

## Overview
Contains all public-facing pages for the JICEST 2025 conference website. These are the main pages visitors see when learning about and registering for the conference.

## Main Pages

### index.blade.php
**Main Landing Page**
- Hero section with conference title and key speakers
- Conference countdown timer
- About section with sub-themes
- Important dates with Early Bird/Non Early Bird structure
- Pricing information
- Location and contact information
- Call-to-action for registration

### about.blade.php
**Detailed Conference Information**
- Complete conference description
- 2025 theme: "Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society"
- Detailed sub-theme breakdown covering all FAINTEK departments
- Conference objectives and scope
- Target audience information

### contact.blade.php
**Contact Information and Form**
- Contact persons: Yudi Arista Yulanda and Andini Vermita Bestari
- Phone numbers with WhatsApp links
- Email: jicest@unja.ac.id
- University address
- Embedded Google Maps
- Contact form for inquiries

### registration-fee.blade.php
**Pricing and Payment Details**
- Early Bird pricing (29 Sep - 31 Oct 2025)
- Non Early Bird pricing (1 Nov - 22 Nov 2025)
- Presenter: 350K IDR (Early Bird), 450K IDR (Non Early Bird)
- Participant: 250K IDR (Early Bird), 350K IDR (Non Early Bird)
- Payment instructions and bank details

### rundown.blade.php
**Conference Schedule**
- Conference date: November 28, 2025
- Event timeline
- Session details
- Online format information

## Components Directory (`components/`)

### header.blade.php
**Main Hero Section**
- Conference branding and title
- Opening speech section with Dean and Rector photos
- Background image (currently `fstaaa.jpeg`)
- Navigation integration
- Registration call-to-action

### about.blade.php
**Conference Overview Component**
- JICEST logo and branding
- Conference description
- Sub-theme listing with FAINTEK department structure:
  - Mathematical & Natural Sciences
  - Earth Sciences & Mining Technology
  - Civil, Chemical & Environmental Engineering
  - Electrical Engineering & Information Systems
  - Educational Technology

### date.blade.php
**Important Dates with Countdowns**
- Early Bird section: Abstract (31 Oct), Full Paper (22 Nov)
- Non Early Bird section: Abstract & Full Paper (22 Nov)
- JavaScript countdown timers
- Color-coded sections (green/blue for Early Bird, orange/red for Non Early Bird)

### pricing.blade.php
**Ticket Pricing Component**
- Simplified pricing structure
- Early Bird vs Non Early Bird comparison
- Online-only format (all offline references removed)
- Clear pricing display with IDR and USD

### keynote.blade.php
**Keynote Speaker Information**
- Speaker profiles and photos
- Bio information
- Session details

### icon-jambi.blade.php
**Local Branding Elements**
- Jambi cultural elements
- University branding
- Regional identity components

## Design Philosophy

### Visual Design
- **Color Scheme**: Sky blue gradients, orange accents
- **Typography**: Modern, professional fonts
- **Layout**: Clean, academic conference aesthetic
- **Responsive**: Mobile-first with Tailwind CSS

### User Experience
- **Clear Navigation**: Easy access to key information
- **Information Hierarchy**: Important details prominently displayed
- **Call-to-Actions**: Clear registration and contact prompts
- **Performance**: Optimized loading and interactive elements

### Content Strategy
- **Academic Focus**: Professional conference presentation
- **Comprehensive Information**: All necessary details for attendees
- **Updated Content**: 2025 conference details with current contacts
- **Online Format**: Emphasis on digital participation

## Recent Updates (2025)
- Updated conference theme and dates
- Revised sub-themes to reflect FAINTEK department structure
- New contact information (Yudi and Andini)
- Simplified pricing structure (Presenter/Participant only)
- Online-only format (removed all offline options)
- Enhanced narratives and descriptions
- Early Bird vs Non Early Bird date structure

## Technical Notes
- Uses Laravel Blade templating
- Tailwind CSS for responsive design
- Alpine.js for interactive elements
- JavaScript countdown timers
- Component-based architecture for reusability