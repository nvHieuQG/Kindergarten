<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => \App\Models\Post::count(),
            'published_posts' => \App\Models\Post::published()->count(),
            'total_teachers' => \App\Models\Teacher::count(),
            'active_teachers' => \App\Models\Teacher::active()->count(),
            'total_events' => \App\Models\Event::count(),
            'upcoming_events' => \App\Models\Event::upcoming()->count(),
            'total_enrollments' => \App\Models\Enrollment::count(),
            'pending_enrollments' => \App\Models\Enrollment::pending()->count(),
            'total_contacts' => \App\Models\Contact::count(),
            'unread_contacts' => \App\Models\Contact::unread()->count(),
            'total_comments' => \App\Models\Comment::count(),
            'pending_comments' => \App\Models\Comment::pending()->count(),
        ];

        // Recent items
        $recentPosts = \App\Models\Post::with('user', 'category')->latest()->take(5)->get();
        $recentEnrollments = \App\Models\Enrollment::latest()->take(5)->get();
        $recentContacts = \App\Models\Contact::latest()->take(5)->get();
        $pendingComments = \App\Models\Comment::with('post')->pending()->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentEnrollments', 'recentContacts', 'pendingComments'));
    }
}
