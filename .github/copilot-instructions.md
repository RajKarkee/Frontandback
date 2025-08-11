# Charter Laravel Project — Copilot AI Agent Instructions

## Project Overview
- This is a Laravel-based web application. Core logic follows standard Laravel conventions: MVC structure, Eloquent ORM, service providers, and Blade templating.
- Main directories:
  - `app/Http/Controllers/`: Route controllers
  - `app/Models/`: Eloquent models (e.g., `User.php`)
  - `resources/views/`: Blade templates for UI
  - `routes/web.php`: Main web routes
  - `database/migrations/`: DB schema migrations
  - `database/seeders/`: DB seeders
  - `public/`: Web root

## Key Workflows
- **Development server:**
  - Start: `php84 artisan serve`
- **Database migrations:**
  - Run: `php artisan migrate`
- **Seeding:**
  - Run: `php84 artisan db:seed`
- **Testing:**
  - Run: `vendor\bin\phpunit` (Windows) or `php artisan test`
- **Asset build:**
  - Use Vite: `npm run dev` (see `vite.config.js`)

## Project-Specific Patterns
- Controllers are grouped by domain in `app/Http/Controllers/`.
- Models are in `app/Models/` and use Eloquent ORM.
- Blade templates are organized by page in `resources/views/`.
- Route definitions are in `routes/web.php` (web) and `routes/console.php` (CLI).
- Service providers are in `app/Providers/`.
- Configuration is in `config/` (e.g., `config/app.php`).
- Use factories in `database/factories/` for test data.

## Integration & Dependencies
- Uses Composer for PHP dependencies (`composer.json`).
- Uses NPM for JS/CSS assets (`package.json`).
- Laravel core and common packages (see `composer.json`).
- No custom cross-component communication patterns beyond standard Laravel events, jobs, and service providers.

## Examples
- To add a new page: create a Blade file in `resources/views/`, add a route in `routes/web.php`, and a controller method in `app/Http/Controllers/`.
- To add a new model: create in `app/Models/`, add migration in `database/migrations/`, and register relationships in Eloquent.

## Conventions
- Follow PSR-4 autoloading (see `composer.json`).
- Use snake_case for DB columns, camelCase for PHP variables.
- Blade templates use `@extends`, `@section`, and `@include` for layout.
- Tests are in `tests/Feature/` and `tests/Unit/`.

## References
- See `README.md` for general Laravel info.
- See `phpunit.xml` for test config.
- See `vite.config.js` for asset build config.


