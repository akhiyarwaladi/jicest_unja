# HTTP Directory

## Overview
Contains all HTTP-related components for handling web requests and responses in the JICEST conference system.

## Structure
```
├── Controllers/       # Request handlers
│   └── Auth/         # Authentication controllers
├── Livewire/         # Real-time components
│   └── backup/       # Backup Livewire components
├── Middleware/       # Request/response filters
└── Requests/         # Form request validation
    └── Auth/         # Authentication requests
```

## Controllers (`Controllers/`)
Main application controllers handling different aspects:

### Core Controllers
- **ParticipantController**: Manages participant registration, profile, submissions
- **PaymentController**: Handles payment verification and management
- **UploadAbstractController**: Abstract submission and review
- **UploadFulltextController**: Full-text paper management
- **DownloadController**: File download functionality
- **HomeController**: General dashboard and homepage

### Auth Controllers (`Auth/`)
Authentication and user management:
- Registration and login
- Password reset
- Email verification
- Profile management

## Livewire Components (`Livewire/`)
Interactive components for dynamic user interfaces:
- **LoginForm**: Dynamic login form
- **RegisterForm**: User registration form
- Real-time form validation
- Dynamic content updates without page refresh

## Middleware (`Middleware/`)
Request filtering and processing:
- Authentication verification
- Role-based access control
- Request validation
- CORS handling

## Requests (`Requests/`)
Form validation classes:
- Input validation rules
- Custom validation messages
- Data sanitization
- Security validation

## Key Features
- **Conference Registration**: Complete participant registration workflow
- **Abstract/Paper Submission**: File upload and management system
- **Payment Processing**: Receipt upload and verification
- **User Dashboard**: Personalized user interface
- **Administrative Tools**: Conference management interface
- **Real-time Updates**: Livewire-powered dynamic components

## Security Features
- CSRF protection
- Input validation and sanitization
- File upload security
- Authentication middleware
- Authorization policies

## Development Notes
- Follows RESTful conventions
- Uses Laravel's built-in validation
- Implements proper error handling
- Integrates with Livewire for enhanced UX