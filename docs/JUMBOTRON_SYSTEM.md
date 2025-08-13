# Jumbotron Management System

## Overview

The Jumbotron Management System allows administrators to dynamically manage hero sections (jumbotrons) across all frontend pages. This system replaces hardcoded hero sections with a flexible, database-driven solution.

## Features

### Backend (Admin Panel)
- **Page Selection**: Choose from predefined page slugs
- **Image Upload**: Upload and manage background images
- **Content Management**: Edit titles and subtitles
- **Status Control**: Activate/deactivate jumbotrons
- **Sort Order**: Control display priority
- **Preview**: Live preview while editing
- **Caching**: Optimized performance with cache management

### Frontend Integration
- **Dynamic Content**: Automatic content loading based on page slug
- **Responsive Design**: Mobile-optimized layouts
- **Performance**: Lazy loading and image optimization
- **Fallback Support**: Default content when no jumbotron exists
- **Component-based**: Reusable Blade component

## Database Structure

### Jumbotrons Table
```sql
- id (primary key)
- page_slug (unique string) - identifies which page this jumbotron belongs to
- title (string) - main heading text
- subtitle (text) - descriptive text below title
- background_image_url (nullable string) - path to uploaded image
- is_active (boolean) - whether jumbotron is active
- sort_order (integer) - display priority
- created_at/updated_at (timestamps)
```

## Usage

### Admin Panel Access
1. Navigate to `/admin/jumbotrons`
2. View all existing jumbotrons
3. Create new jumbotrons for available pages
4. Edit existing content and images
5. Toggle active/inactive status

### Frontend Implementation
Use the jumbotron component in any Blade template:

```blade
<!-- Basic usage -->
<x-jumbotron page-slug="home" />

<!-- With custom options -->
<x-jumbotron 
    page-slug="about" 
    height="70vh" 
    min-height="500px"
    overlay-opacity="50"
    text-color="white">
    <!-- Optional slot content like buttons -->
    <a href="/contact" class="btn-primary">Contact Us</a>
</x-jumbotron>
```

## Available Page Slugs
- `home` - Home Page
- `about` - About Us
- `services` - Services
- `industries` - Industries
- `insights` - Insights & Articles
- `careers` - Careers
- `contact` - Contact Us
- `offices` - Our Offices
- `events` - Events
- `blogs` - Blog Articles

## Component Properties

### x-jumbotron Component
- `page-slug` (required) - Page identifier
- `height` (optional, default: "60vh") - Section height
- `min-height` (optional, default: "60vh") - Minimum height
- `overlay-opacity` (optional, default: "40") - Background overlay opacity
- `text-color` (optional, default: "crisp-white") - Text color class
- `jumbotron` (optional) - Pass jumbotron object directly

## Performance Optimizations

### Caching
- Jumbotron data cached for 1 hour per page
- Automatic cache clearing on create/update/delete
- Helper methods for manual cache management

### Image Loading
- Lazy loading implementation
- Error handling with fallback images
- Optimized background image delivery

### Mobile Optimization
- Responsive font sizes
- Flexible height adjustments
- Touch-friendly interface

## File Structure

```
app/
├── Helpers/
│   └── JumbotronHelper.php          # Helper functions
├── Http/Controllers/Admin/
│   └── JumbotronController.php      # Admin CRUD operations
└── Models/
    └── Jumbotron.php               # Model with relationships

database/
├── migrations/
│   └── create_jumbotrons_table.php # Database schema
└── seeders/
    └── JumbotronSeeder.php         # Default data

resources/views/
├── admin/jumbotrons/
│   ├── index.blade.php             # List view
│   ├── create.blade.php            # Create form
│   ├── edit.blade.php              # Edit form
│   └── show.blade.php              # Detail view
└── components/
    └── jumbotron.blade.php         # Frontend component
```

## API Endpoints (Admin)

```
GET    /admin/jumbotrons           # List all jumbotrons
GET    /admin/jumbotrons/create    # Show create form
POST   /admin/jumbotrons           # Store new jumbotron
GET    /admin/jumbotrons/{id}      # Show jumbotron details
GET    /admin/jumbotrons/{id}/edit # Show edit form
PUT    /admin/jumbotrons/{id}      # Update jumbotron
DELETE /admin/jumbotrons/{id}      # Delete jumbotron
POST   /admin/jumbotrons/{id}/toggle-status # Toggle active status
```

## Helper Methods

```php
// Get jumbotron for specific page
JumbotronHelper::getJumbotron('home');

// Get with fallback defaults
JumbotronHelper::getJumbotronWithFallback('about', [
    'title' => 'Custom Title',
    'subtitle' => 'Custom subtitle'
]);

// Clear cache
JumbotronHelper::clearCache('home');
JumbotronHelper::clearAllCache();

// Render component HTML
JumbotronHelper::renderJumbotron('contact', [
    'height' => '50vh',
    'overlay_opacity' => '30'
]);
```

## Migration Commands

```bash
# Run migration
php artisan migrate

# Seed default data
php artisan db:seed --class=JumbotronSeeder

# Create storage link (for image uploads)
php artisan storage:link

# Clear cache
php artisan cache:clear
```

## Security Features

- File upload validation (image types only)
- CSRF protection on all forms
- Size limits on image uploads
- Path traversal protection
- XSS protection in output

## Customization

### Adding New Page Slugs
1. Update `getAvailablePageSlugs()` in `Jumbotron` model
2. Add corresponding routes if needed
3. Update seeder data

### Styling Customization
- Modify `resources/views/components/jumbotron.blade.php`
- Add custom CSS in the component's `@push('styles')` section
- Override default classes via component properties

### Image Storage
- Default storage: `storage/app/public/jumbotrons/`
- Accessible via: `/storage/jumbotrons/filename.jpg`
- Configurable in `JumbotronController`

## Troubleshooting

### Common Issues
1. **Images not displaying**: Ensure `php artisan storage:link` was run
2. **Cache not clearing**: Check file permissions on storage/cache
3. **Component not found**: Run `composer dump-autoload`
4. **Upload errors**: Check file size limits in php.ini

### Error Handling
- Graceful fallbacks for missing images
- Default content for missing jumbotrons
- Validation messages for form errors
- Cache error recovery

## Future Enhancements

- Multi-language support
- A/B testing capabilities
- Analytics integration
- Bulk operations
- Image optimization pipeline
- Video background support
