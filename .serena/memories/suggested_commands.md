# Suggested Commands

## Development Commands

### Laravel/PHP Commands
```bash
# Start development server
php artisan serve

# Run database migrations
php artisan migrate

# Refresh migrations (drop all tables and re-migrate)
php artisan migrate:refresh

# Seed database
php artisan db:seed

# Generate application key
php artisan key:generate

# Clear application cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Create new controller
php artisan make:controller ControllerName

# Create new model with migration
php artisan make:model ModelName -m

# Create new middleware
php artisan make:middleware MiddlewareName

# Run artisan tinker (REPL)
php artisan tinker
```

### Frontend Commands
```bash
# Install JavaScript dependencies
npm install

# Start development server with hot reload
npm run dev

# Build for production
npm run build
```

### Testing Commands
```bash
# Run all tests
php artisan test
# or
vendor/bin/phpunit

# Run specific test file
php artisan test tests/Feature/ExampleTest.php

# Run tests with coverage
vendor/bin/phpunit --coverage-html coverage
```

### Code Quality Commands
```bash
# Run Laravel Pint (code formatter)
vendor/bin/pint

# Run Laravel Pint in dry-run mode (check only)
vendor/bin/pint --test
```

### Package Management
```bash
# Install PHP dependencies
composer install

# Update PHP dependencies  
composer update

# Install production dependencies only
composer install --no-dev --optimize-autoloader

# Update JavaScript dependencies
npm update
```

### Database Commands
```bash
# Check database connection
php artisan db:show

# Run specific migration
php artisan migrate --path=/database/migrations/filename.php

# Rollback last migration batch
php artisan migrate:rollback

# Reset all migrations
php artisan migrate:reset
```