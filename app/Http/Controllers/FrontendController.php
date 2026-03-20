<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Teacher;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Enrollment;
use App\Models\Branch;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\EnrollmentRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        // Eager load category & user to avoid N+1
        $recentPosts = Post::with(['category', 'user'])
            ->published()
            ->latest()
            ->take(3)
            ->get();

        // Cache slow-changing data (1 hour)
        $teachers = Cache::remember('teachers_active', 3600, fn () =>
            Teacher::active()->ordered()->take(4)->get()
        );

        $services = Cache::remember('services_latest', 3600, fn () =>
            Service::latest()->take(4)->get()
        );

        $branches = Cache::remember('branches_active', 3600, fn () =>
            Branch::active()->ordered()->get()
        );

        return view('frontend.home', compact('recentPosts', 'teachers', 'services', 'branches'));
    }

    public function blog(Request $request)
    {
        $query = Post::with(['category', 'user'])->published();

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $slug = $request->get('category');
            $query->whereHas('category', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        $posts = $query->latest()->paginate(9)->withQueryString();

        $categories = Cache::remember('categories_with_count', 1800, fn () =>
            Category::withCount('posts')->get()
        );

        // Popular posts moved from view to controller
        $popularPosts = Post::with('user')
            ->published()
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        return view('frontend.blog', compact('posts', 'categories', 'popularPosts'));
    }

    public function postDetail($slug)
    {
        $post = Post::with(['category', 'user'])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Atomic increment - safe for concurrent requests
        $post->increment('views');

        $recentPosts = Post::with('user')
            ->published()
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        $categories = Cache::remember('categories_with_count', 1800, fn () =>
            Category::withCount('posts')->get()
        );

        return view('frontend.post-detail', compact('post', 'recentPosts', 'categories'));
    }

    public function sitemap()
    {
        $posts = Post::published()
            ->select('slug', 'updated_at')
            ->latest('updated_at')
            ->get();

        $content = view('frontend.sitemap', compact('posts'))->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }

    public function storeContact(ContactRequest $request)
    {
        try {
            $validated = $request->validated();

            if (empty($validated['subject'])) {
                $validated['subject'] = 'Tư vấn từ trang chủ';
            }

            $contact = Contact::create($validated);

            Log::info('New contact submitted', [
                'id'   => $contact->id,
                'name' => $contact->name,
                'phone' => $contact->phone,
                'ip'   => $request->ip(),
            ]);

            return redirect()->back()->with('success', 'Tin nhắn của bạn đã được gửi thành công!');
        } catch (\Exception $e) {
            Log::error('Failed to store contact', [
                'error' => $e->getMessage(),
                'data'  => $request->except(['_token']),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi khi gửi tin nhắn. Vui lòng thử lại sau.');
        }
    }

    public function storeEnrollment(EnrollmentRequest $request)
    {
        try {
            $validated = $request->validated();

            $enrollment = Enrollment::create($validated);

            Log::info('New enrollment submitted', [
                'id'           => $enrollment->id,
                'child_name'   => $enrollment->child_name,
                'parent_name'  => $enrollment->parent_name,
                'parent_phone' => $enrollment->parent_phone,
                'ip'           => $request->ip(),
            ]);

            return redirect()->back()->with('success', 'Đơn đăng ký tư vấn đã được gửi thành công! Chúng tôi sẽ liên hệ với bạn trong vòng 24h.');
        } catch (\Exception $e) {
            Log::error('Failed to store enrollment', [
                'error' => $e->getMessage(),
                'data'  => $request->except(['_token', 'child_dob_year']),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi khi gửi đơn đăng ký. Vui lòng thử lại sau.');
        }
    }
}
