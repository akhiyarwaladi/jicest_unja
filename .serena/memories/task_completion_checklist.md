# Task Completion Checklist

## After Making Code Changes

### 1. Code Quality Checks
```bash
# Run Laravel Pint to format code
vendor/bin/pint

# Check for syntax errors
php -l app/path/to/file.php
```

### 2. Testing
```bash
# Run all tests to ensure nothing is broken
php artisan test

# If creating new features, write and run specific tests
php artisan test tests/Feature/NewFeatureTest.php
```

### 3. Database Changes
```bash
# If migrations were added, ensure they run successfully
php artisan migrate

# Test rollback if needed
php artisan migrate:rollback --step=1
```

### 4. Frontend Assets
```bash
# If frontend changes were made, rebuild assets
npm run build

# For development, ensure dev server works
npm run dev
```

### 5. Configuration and Cache
```bash
# Clear caches after configuration changes
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# If routes were modified
php artisan route:clear
```

### 6. Manual Testing
- Test the functionality in browser
- Check both administrator and participant user flows
- Verify file uploads/downloads work
- Test payment validation workflow
- Check responsive design on mobile

### 7. Security Checks
- Ensure no sensitive data in version control
- Verify proper authentication/authorization
- Check for SQL injection vulnerabilities
- Validate file upload restrictions

### 8. Documentation
- Update relevant documentation if API changes
- Add comments for complex business logic
- Update README if installation steps change