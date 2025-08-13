<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Industry;
use App\Models\Insight;
use App\Models\Office;
use App\Models\Page;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'pages' => Page::count(),
            'blogs' => Blog::count(),
            'events' => Event::count(),
            'careers' => Career::count(),
            'contacts' => Contact::count(),
            'services' => Service::count(),
            'industries' => Industry::count(),
            'offices' => Office::count(),
            'insights' => Insight::count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();
        $recentBlogs = Blog::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'recentBlogs'));
    }
}
