# App Directory

## Overview
This directory contains the core application logic for the JICEST conference management system.

## Structure
```
├── Console/           # Artisan commands
├── Exceptions/        # Custom exception handling
├── Exports/          # Data export functionality
├── Http/             # HTTP layer (Controllers, Middleware, Requests, Livewire)
├── Mail/             # Email templates and mail classes
├── Models/           # Eloquent models
├── Policies/         # Authorization policies
├── Providers/        # Service providers
└── View/             # View composers and components
```

## Key Components

### HTTP Layer (`Http/`)
- **Controllers**: Handle HTTP requests and responses
- **Middleware**: Request/response filtering
- **Requests**: Form request validation
- **Livewire**: Real-time components for dynamic interactions

### Models (`Models/`)
Core data models representing conference entities:
- User management and authentication
- Participant registration and management
- Abstract and full-text submissions
- Payment processing and verification

### Mail (`Mail/`)
Email functionality for:
- Registration confirmations
- Payment notifications
- Abstract/paper status updates
- Administrative notifications

### Policies (`Policies/`)
Authorization rules for:
- User access control
- Administrative permissions
- Content management permissions

## Key Features Implemented
- Multi-role authentication (admin, participant, presenter)
- Conference registration system
- Abstract and full-text submission workflow
- Payment verification system
- Certificate generation
- Administrative dashboard

## Development Notes
- Follows Laravel conventions and best practices
- Uses Eloquent ORM for database operations
- Implements proper validation and authorization
- Integrates with Livewire for dynamic components