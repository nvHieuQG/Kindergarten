<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => \App\Models\Post::count(),
            'published_posts' => \App\Models\Post::published()->count(),
            'total_teachers' => \App\Models\Teacher::count(),
            'active_teachers' => \App\Models\Teacher::active()->count(),
            'total_enrollments' => \App\Models\Enrollment::count(),
            'pending_enrollments' => \App\Models\Enrollment::where('status', 'pending')->count(),
            'total_contacts' => \App\Models\Contact::count(),
            'unread_contacts' => \App\Models\Contact::where('status', 'unread')->count(),
        ];

        // Recent items
        $recentPosts = \App\Models\Post::with('user', 'category')->latest()->take(5)->get();
        $recentEnrollments = \App\Models\Enrollment::latest()->take(5)->get();
        $recentContacts = \App\Models\Contact::latest()->take(5)->get();


        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentEnrollments', 'recentContacts'));
    }
}
