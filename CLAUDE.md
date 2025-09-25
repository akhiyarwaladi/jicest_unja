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
  - Yudi Arista Yulanda (+6285266524920)
  - Andini Vermita Bestari (+6285719405940)

## Development Notes
- Uses Livewire for dynamic components
- Tailwind CSS for responsive design
- Manual payment verification system
- File uploads stored in `public/uploads/`
- Certificates generated via DomPDF