# Dynamic Navigation Settings System

## Overview
This system allows you to dynamically manage sidebar navigation data through the admin panel while keeping the services data static as requested.

## Features
- **Dynamic Navigation Data**: Titles, descriptions, images, tags, and icons can be managed from the admin panel
- **Static Services Data**: The data-services attribute remains hardcoded as per your requirement
- **Fallback System**: If no dynamic data is available, the system falls back to the original hardcoded values
- **Image Management**: Upload custom preview images or use external URLs

## How It Works

### 1. Database Structure
- **Table**: `navigation_settings`
- **Key Fields**:
  - `page_slug`: Unique identifier (home, services, industries, etc.)
  - `page_title`: Display title
  - `route_name`: Laravel route name
  - `icon_class`: Font Awesome icon class
  - `description`: Navigation description
  - `preview_image`: Image URL or path
  - `tags`: Comma-separated tags
  - `metadata`: JSON field for future extensions
  - `is_active`: Enable/disable navigation item
  - `sort_order`: Display order

### 2. Admin Management
- **URL**: `/admin/navigation-settings`
- **Features**:
  - View all navigation items
  - Edit individual navigation settings
  - Upload custom images
  - Change icons, descriptions, and tags
  - Enable/disable navigation items
  - Set display order

### 3. Frontend Integration
The sidebar automatically pulls data from the database through the `SidebarComposer`:
- Uses dynamic data when available
- Falls back to hardcoded data if database is empty
- Services data remains static as requested

## Usage

### To Edit Navigation Data:
1. Go to Admin Panel → Website Design → Navigation Settings
2. Click "Edit" on any navigation item
3. Update the information as needed
4. Save changes

### Available Fields to Edit:
- **Page Title**: Display name in sidebar
- **Route Name**: Laravel route (usually don't change this)
- **Icon Class**: Font Awesome icon (e.g., fas fa-home)
- **Description**: Hover preview description
- **Preview Image**: Upload custom image or use URL
- **Tags**: Comma-separated tags for preview
- **Status**: Active/Inactive
- **Sort Order**: Display position

### Services Data
The `data-services` attribute remains hardcoded in the template as requested. You can add a separate column to the `metadata` field in the future if you want to make this dynamic later.

## Example Dynamic Navigation Item

```php
// Database record
NavigationSetting {
    page_slug: 'home',
    page_title: 'Home',
    route_name: 'home',
    icon_class: 'fas fa-home',
    description: 'Welcome to our website...',
    preview_image: 'storage/navigation/home-preview.jpg',
    tags: 'Finance,Consulting,Audit',
    is_active: true,
    sort_order: 1
}
```

```blade
// Generated HTML
<a href="{{ route('home') }}" data-tooltip="Home"
    data-image="https://yoursite.com/storage/navigation/home-preview.jpg"
    data-description="Welcome to our website..."
    data-tags="Finance,Consulting,Audit"
    data-services='[static services data]'>
    <i class="fas fa-home"></i>
    <span>Home</span>
</a>
```

## Files Created/Modified

### New Files:
- `database/migrations/2024_01_15_000000_create_navigation_settings_table.php`
- `app/Models/NavigationSetting.php`
- `database/seeders/NavigationSettingSeeder.php`
- `app/Http/Controllers/Admin/NavigationSettingAdminController.php`
- `resources/views/admin/navigation-settings/index.blade.php`
- `resources/views/admin/navigation-settings/edit.blade.php`

### Modified Files:
- `app/View/Composers/SidebarComposer.php` - Added navigation data
- `resources/views/new/layouts/sidebar.blade.php` - Made dynamic (partially)
- `routes/web.php` - Added navigation settings routes
- `resources/views/admin/partials/sidebar.blade.php` - Added admin menu item

## Next Steps
1. Run the migration and seeder to populate default data
2. Visit `/admin/navigation-settings` to manage navigation
3. Edit individual navigation items as needed
4. Services data can be made dynamic later by extending the metadata field

## Benefits
- **Easy Content Management**: Update navigation without code changes
- **Consistent Fallback**: Never breaks if database is empty
- **Flexible**: Easy to extend with more fields
- **Admin Friendly**: Simple interface for content managers
- **SEO Friendly**: Better control over descriptions and tags
