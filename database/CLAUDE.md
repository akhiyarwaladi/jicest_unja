# Database Directory

## Overview
Contains all database-related files including migrations, seeders, and factories for the JICEST conference management system.

## Structure
```
├── factories/        # Model factories for testing
├── migrations/       # Database schema migrations
└── seeders/         # Database seeders for initial data
```

## Database Schema Overview

### Core Tables

#### users
**User Authentication and Management**
- id, name, email, password
- email_verified_at, remember_token
- role-based access control
- timestamps for account tracking

#### participants
**Conference Participant Information**
- Personal details (name, gender, affiliation)
- Contact information (phone, address)
- Registration type (presenter_reguler, presenter_student, participant_reguler, participant_student)
- Conference preferences (online/offline)
- Institution and professional details
- User relationship (foreign key to users table)

#### upload_abstracts
**Abstract Submission Management**
- Submission metadata (category, presentation_type)
- Title and author information
- Abstract content and keywords
- File upload paths
- Review status (pending, accepted, rejected)
- Participant relationship
- Administrator approval tracking

#### upload_fulltexts
**Full-text Paper Submissions**
- Paper submission details
- File paths for uploaded papers
- Review and approval status
- Publication readiness
- Author and co-author information
- Category classification

#### payments
**Payment Verification System**
- Payment amount (IDR and USD)
- Receipt image uploads
- Payment status (pending, valid, rejected)
- Bank transfer details
- Administrative verification
- Participant and submission relationships

### Supporting Tables

#### password_resets
- Email-based password reset functionality
- Token management for secure resets

#### failed_jobs
- Job queue failure tracking
- System reliability monitoring

#### personal_access_tokens
- API authentication tokens
- Secure access management

## Migration Files
Database schema evolution tracking:
- User table creation and modifications
- Participant registration structure
- Abstract and full-text submission tables
- Payment verification system
- Index creation for performance
- Foreign key relationships

## Seeders (`seeders/`)
Initial data population:
- **DatabaseSeeder.php**: Main seeder coordinator
- Admin user creation
- Default conference categories
- System configuration data
- Test data for development

## Factories (`factories/`)
Model factories for testing and development:
- **UserFactory**: Generate test users
- **ParticipantFactory**: Create sample participants
- Fake data generation for testing workflows
- Conference scenario simulation

## Conference Data Structure

### Registration Types
- presenter_reguler
- presenter_student
- participant_reguler
- participant_student

### Categories
- engineering
- science_technology
- digital_transformation_education
- sustainable_engineering
- stem_education

### Presentation Types
- oral presentation
- poster presentation

### Payment Status Workflow
1. **pending**: Initial payment submission
2. **valid**: Administratively approved
3. **rejected**: Payment issues requiring correction

### Review Status Workflow
1. **pending**: Under review
2. **accepted**: Approved for conference
3. **rejected**: Not accepted for conference

## Data Relationships
- Users can have one participant profile
- Participants can submit multiple abstracts
- Each abstract can have one associated payment
- Full-text papers link to accepted abstracts
- Administrative users can review and approve all submissions

## Performance Considerations
- Indexed columns for search optimization
- Foreign key constraints for data integrity
- Efficient query structures for large datasets
- Proper normalization to reduce redundancy

## Security Measures
- Secure password hashing
- Protected file upload paths
- Audit trails for administrative actions
- Data validation at database level

## Backup and Recovery
- Regular database backups
- Point-in-time recovery capability
- Data export functionality for reports
- Migration rollback capabilities