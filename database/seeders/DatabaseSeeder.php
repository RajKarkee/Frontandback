<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Career;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Industry;
use App\Models\Office;
use App\Models\Insight;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user only if doesn't exist
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        }

        // Create regular users
        User::factory(10)->create();

        // Create main pages
        if (!Page::where('slug', 'home')->exists()) {
            Page::factory()->create([
                'title' => 'Home',
                'slug' => 'home',
                'content' => '<h1>Welcome to Our Company</h1><p>This is the home page content.</p>',
                'status' => 'active',
            ]);
        }

        if (!Page::where('slug', 'about')->exists()) {
            Page::factory()->create([
                'title' => 'About Us',
                'slug' => 'about',
                'content' => '<h1>About Our Company</h1><p>Learn more about our company, mission, and values.</p>',
                'status' => 'active',
            ]);
        }

        // Create additional pages
        Page::factory(5)->create();

        // Create blogs
        Blog::factory(20)->create();

        Career::factory(15)->create();

        // Create sample contacts
        Contact::factory(25)->create();

        // Create events
        if (!Event::where('slug', 'annual-tech-conference-2025')->exists()) {
            Event::factory()->create([
                'title' => 'Annual Tech Conference 2025',
                'slug' => 'annual-tech-conference-2025',
                'description' => 'Join us for our annual technology conference featuring industry leaders.',
                'location' => 'New York Convention Center',
                'start_date' => now()->addMonths(2),
                'end_date' => now()->addMonths(2)->addDays(3),
                'status' => 'active',
            ]);
        }

        Event::factory(5)->create();

        // Create industries
        if (!Industry::where('slug', 'technology')->exists()) {
            Industry::factory()->create([
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Cutting-edge technology solutions for modern businesses',
                'status' => 'active',
                'sort_order' => 1,
            ]);
        }

        if (!Industry::where('slug', 'healthcare')->exists()) {
            Industry::factory()->create([
                'name' => 'Healthcare',
                'slug' => 'healthcare',
                'description' => 'Digital transformation solutions for healthcare providers',
                'status' => 'active',
                'sort_order' => 2,
            ]);
        }

        Industry::factory(4)->create();

        // Create offices
        if (!Office::where('slug', 'new-york-headquarters')->exists()) {
            Office::factory()->create([
                'name' => 'New York Headquarters',
                'slug' => 'new-york-headquarters',
                'address' => '123 Business Ave',
                'city' => 'New York',
                'state' => 'NY',
                'country' => 'USA',
                'postal_code' => '10001',
                'phone' => '+1 (555) 123-4567',
                'email' => 'newyork@example.com',
                'status' => 'active',
            ]);
        }

        Office::factory(2)->create();

        // Create insights
        Insight::factory(15)->create();

        // Create jumbotrons
        $this->call([
            JumbotronSeeder::class,
            ServiceSeeder::class,
            ServiceProcessSeeder::class,
        ]);
    }
}
