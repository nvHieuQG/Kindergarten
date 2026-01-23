<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Teacher;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Enrollment;
use App\Models\Branch;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\EnrollmentRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $recentPosts = Post::published()->latest()->take(3)->get();
        $teachers = Teacher::active()->ordered()->take(4)->get();
        $services = Service::latest()->take(4)->get();
        $branches = Branch::active()->ordered()->get();

        return view('frontend.home', compact('recentPosts', 'teachers', 'services', 'branches'));
    }

    public function blog(Request $request)
    {
        $query = Post::published();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->has('category')) {
            $slug = $request->get('category');
            $query->whereHas('category', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        $posts = $query->latest()->paginate(9);
        return view('frontend.blog', compact('posts'));
    }

    public function postDetail($slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();

        // Increase view count
        $post->increment('views');

        $recentPosts = Post::published()->where('id', '!=', $post->id)->latest()->take(3)->get();

        return view('frontend.post-detail', compact('post', 'recentPosts'));
    }

    public function storeContact(ContactRequest $request)
    {
        try {
            $validated = $request->validated();
            
            // Ensure subject is set (default from prepareForValidation)
            if (empty($validated['subject'])) {
                $validated['subject'] = 'Tư vấn từ trang chủ';
            }

            $contact = Contact::create($validated);

            // Log the contact submission
            Log::info('New contact submitted', [
                'id' => $contact->id,
                'name' => $contact->name,
                'phone' => $contact->phone,
                'ip' => $request->ip(),
            ]);

            return redirect()->back()->with('success', 'Tin nhắn của bạn đã được gửi thành công!');
        } catch (\Exception $e) {
            Log::error('Failed to store contact', [
                'error' => $e->getMessage(),
                'data' => $request->except(['_token']),
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

            // Log the enrollment submission
            Log::info('New enrollment submitted', [
                'id' => $enrollment->id,
                'child_name' => $enrollment->child_name,
                'parent_name' => $enrollment->parent_name,
                'parent_phone' => $enrollment->parent_phone,
                'ip' => $request->ip(),
            ]);

            return redirect()->back()->with('success', 'Đơn đăng ký tư vấn đã được gửi thành công! Chúng tôi sẽ liên hệ với bạn trong vòng 24h.');
        } catch (\Exception $e) {
            Log::error('Failed to store enrollment', [
                'error' => $e->getMessage(),
                'data' => $request->except(['_token', 'child_dob_year']),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi khi gửi đơn đăng ký. Vui lòng thử lại sau.');
        }
    }
}
