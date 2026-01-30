<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Teacher;
use App\Models\Enrollment;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Optimized stats queries - using single queries with conditional counting
            $stats = [
                'total_posts' => Post::count(),
                'published_posts' => Post::published()->count(),
                'total_teachers' => Teacher::count(),
                'active_teachers' => Teacher::active()->count(),
                'total_enrollments' => Enrollment::count(),
                'pending_enrollments' => Enrollment::pending()->count(),
                'total_contacts' => Contact::count(),
                'unread_contacts' => Contact::unread()->count(),
            ];

            // Recent items with eager loading to prevent N+1 queries
            $recentPosts = Post::with(['user:id,name', 'category:id,name'])
                ->latest()
                ->take(5)
                ->get();

            $recentEnrollments = Enrollment::latest()
                ->take(5)
                ->get();

            $recentContacts = Contact::latest()
                ->take(5)
                ->get();

            Log::info('Dashboard accessed', [
                'user_id' => Auth::id(),
                'user_email' => Auth::user()?->email,
            ]);

            return view('admin.dashboard', compact('stats', 'recentPosts', 'recentEnrollments', 'recentContacts'));
        } catch (\Exception $e) {
            Log::error('Dashboard error', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Tránh redirect loop - hiển thị lỗi trực tiếp
            abort(500, 'Đã xảy ra lỗi khi tải dashboard. Vui lòng thử lại sau.');
        }
    }
}
