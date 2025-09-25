# Codebase Structure

## Main Directories

### `/app`
- **`/Http/Controllers`**: Request handling logic
  - `ParticipantController`: Participant management
  - `PaymentController`: Payment processing
  - `UploadAbstractController`: Abstract submission handling
  - `UploadFulltextController`: Full-text paper management
  - `DownloadController`: File download functionality
- **`/Models`**: Eloquent models
  - `User`: Authentication and user data
  - `Participant`: Conference participant data
  - `Payment`: Payment records
  - `UploadAbstract`: Abstract submissions
  - `UploadFulltext`: Full-text paper uploads
- **`/Http/Middleware`**: Request middleware
- **`/Http/Livewire`**: Livewire components
- **`/Policies`**: Authorization policies
- **`/Providers`**: Service providers
- **`/Mail`**: Email templates and logic

### `/resources`
- **`/views`**: Blade templates
  - `/homepage`: Public conference pages
  - `/participant`: Participant dashboard and features
  - `/administrator`: Admin panel
  - `/auth`: Authentication pages
  - `/layouts`: Base layouts and components
- **`/js`**: JavaScript files
- **`/css`**: Stylesheets (Tailwind CSS)

### `/routes`
- `web.php`: Web routes (main application routes)
- `auth.php`: Authentication routes
- `api.php`: API routes
- `console.php`: Artisan commands

### `/database`
- **`/migrations`**: Database schema migrations
- **`/factories`**: Model factories for testing
- **`/seeders`**: Database seeders

### `/config`
- Laravel configuration files

### Root Files
- `composer.json`: PHP dependencies
- `package.json`: JavaScript dependencies  
- `artisan`: Laravel command-line interface
- `.env.example`: Environment configuration template