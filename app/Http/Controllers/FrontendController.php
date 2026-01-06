<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Teacher;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Enrollment;
use App\Models\Branch;
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

    public function about()
    {
        $teachers = Teacher::active()->ordered()->take(4)->get();
        return view('frontend.about', compact('teachers'));
    }

    public function services()
    {
        return view('frontend.service');
    }

    public function programs()
    {
        return view('frontend.program');
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

        $posts = $query->latest()->paginate(9);
        return view('frontend.blog', compact('posts'));
    }

    public function team()
    {
        $teachers = Teacher::active()->ordered()->get();
        return view('frontend.team', compact('teachers'));
    }

    public function testimonials()
    {
        return view('frontend.testimonial');
    }

    public function contact()
    {
        $branches = Branch::active()->ordered()->get();
        return view('frontend.contact', compact('branches'));
    }

    public function enrollment()
    {
        return view('frontend.enrollment');
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'Tin nhắn của bạn đã được gửi thành công!');
    }

    public function storeEnrollment(Request $request)
    {
        $validated = $request->validate([
            'child_name' => 'required|string|max:255',
            'child_dob' => 'nullable|date',
            'child_gender' => 'required|in:male,female,other',
            'parent_name' => 'nullable|string|max:255',

            'parent_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'program' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        Enrollment::create($validated);

        return redirect()->back()->with('success', 'Đơn đăng ký nhập học đã được gửi thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất có thể.');
    }

    public function postDetail($slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();

        // Increase view count
        $post->increment('views');

        $recentPosts = Post::published()->where('id', '!=', $post->id)->latest()->take(3)->get();

        return view('frontend.post-detail', compact('post', 'recentPosts'));
    }
}
