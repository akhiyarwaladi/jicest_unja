# Config Directory

## Overview
Contains Laravel configuration files for the JICEST conference management system. These files define application behavior, database connections, services, and other system settings.

## Key Configuration Files

### app.php
**Application Settings**
- Application name: "JICEST UNJA"
- Environment configuration (production/development)
- Debug settings
- Application URL configuration
- Timezone: Asia/Jakarta
- Locale settings

### database.php
**Database Configuration**
- MySQL database connection for conference data
- Connection pooling and performance settings
- Migration and seeding configuration
- Database-specific settings for uploads and file management

### mail.php
**Email Configuration**
- SMTP settings for conference notifications
- Email templates configuration
- Sender address: jicest@unja.ac.id
- Notification email settings for:
  - Registration confirmations
  - Payment verifications
  - Abstract/paper status updates
  - Administrative alerts

### auth.php
**Authentication Settings**
- User authentication configuration
- Password reset settings
- Email verification configuration
- Multi-role authentication setup (admin, participant, presenter)
- Session management

### filesystems.php
**File Storage Configuration**
- Local storage for uploads
- Upload directories for:
  - Abstract submissions
  - Full-text papers
  - Payment receipts
  - Generated certificates
  - Profile images
- File permission settings
- Storage disk configuration

### services.php
**Third-party Service Integration**
- API configurations
- External service credentials
- Payment gateway settings (if applicable)
- Email service providers

### session.php
**Session Management**
- Session storage configuration
- Cookie settings
- Session lifetime for user authentication
- CSRF protection settings

### cache.php
**Caching Configuration**
- Cache driver settings
- Performance optimization
- Redis configuration (if used)
- Application cache settings

### broadcasting.php
**Real-time Features**
- WebSocket configuration for Livewire
- Real-time updates configuration
- Event broadcasting settings

### logging.php
**Application Logging**
- Log file configuration
- Error tracking
- Debug information logging
- System monitoring settings

## Conference-Specific Settings

### Upload Configuration
- Maximum file sizes for abstracts and papers
- Allowed file types (.pdf, .doc, .docx)
- Storage paths and organization
- Security settings for file uploads

### Payment Settings
- Supported currencies (IDR, USD)
- Payment verification workflow
- Receipt upload requirements
- Bank account information

### Email Templates
- Registration confirmation emails
- Payment notification templates
- Abstract/paper status updates
- Administrative notification formats

### User Roles and Permissions
- Administrator privileges
- Participant access levels
- Presenter-specific permissions
- Guest user limitations

## Security Configuration

### CSRF Protection
- Token validation for forms
- API security settings
- Cross-site request forgery prevention

### File Upload Security
- MIME type validation
- File size restrictions
- Malware scanning configuration
- Storage location security

### Database Security
- Connection encryption
- Prepared statement configuration
- SQL injection prevention

## Performance Settings
- Query optimization
- Asset compilation configuration
- Cache management
- Database connection pooling

## Development vs Production
- Environment-specific settings
- Debug mode configuration
- Asset compilation differences
- Security level adjustments
- Logging verbosity settings

## Integration Points
- University system integration settings
- External API configurations
- Payment gateway connections
- Email service integration
- File storage service connections