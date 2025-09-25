# Code Style & Conventions

## PHP/Laravel Conventions
- **Indentation**: 4 spaces (configured in .editorconfig)
- **Line Endings**: LF (Unix style)
- **Charset**: UTF-8
- **Trailing Whitespace**: Trimmed (except in .md files)
- **Final Newline**: Required

## PHP Code Standards
- **PSR-4 Autoloading**: 
  - `App\` → `app/`
  - `Tests\` → `tests/`
  - `Database\Factories\` → `database/factories/`
  - `Database\Seeders\` → `database/seeders/`

## Laravel Conventions Observed
- **Models**: Singular PascalCase (`Participant`, `Payment`)
- **Controllers**: PascalCase with `Controller` suffix
- **Routes**: kebab-case for URLs (`/registration-fee`, `/scientific-committe`)
- **Database**: 
  - Table names: plural snake_case
  - Column names: snake_case
  - Primary keys: `id`
  - Foreign keys: `{model}_id`

## Blade Templates
- **Directory Structure**: Organized by feature/role
- **Naming**: kebab-case for files
- **Layout Inheritance**: Uses `@extends('layouts.main-tailwind')`
- **Sections**: Standard sections like `@section('css')`, `@section('content')`

## Code Organization Patterns
- **Models**: Use `$guarded = ['id']` instead of `$fillable`
- **Relationships**: Clear method names (`user()`, `uploadAbstracts()`, `payments()`)
- **Controllers**: Thin controllers, business logic in models/services
- **Routes**: Grouped by middleware and functionality

## Frontend Conventions
- **CSS**: Tailwind utility-first approach
- **JavaScript**: Alpine.js for interactivity
- **Assets**: Processed through Vite build system