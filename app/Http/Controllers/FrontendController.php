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

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^(0)[0-9]{9}$/'],
            'message' => 'required|string',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'message.required' => 'Vui lòng nhập nội dung cần tư vấn.',
        ]);

        // Default values for missing fields
        $validated['email'] = $request->input('email', 'no-email@example.com'); // Placeholder as email is removed from form but required in DB
        $validated['subject'] = 'Tư vấn từ trang chủ'; // Default subject

        Contact::create($validated);

        return redirect()->back()->with('success', 'Tin nhắn của bạn đã được gửi thành công!');
    }

    public function storeEnrollment(Request $request)
    {
        $validated = $request->validate([
            'child_name' => 'required|string|max:255',
            'child_dob_year' => 'required|integer|min:2018|max:' . date('Y'),
            'parent_name' => 'required|string|max:255',
            'parent_phone' => ['required', 'string', 'regex:/^(0)[0-9]{9}$/'], // 10 digits starting with 0
            'program' => 'nullable|string|max:255',
        ], [
            'parent_phone.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số bắt đầu bằng số 0.',
            'child_dob_year.min' => 'Năm sinh không hợp lệ.',
            'child_dob_year.max' => 'Năm sinh không hợp lệ.',
            'required' => 'Vui lòng nhập thông tin này.',
        ]);

        // Convert year to a valid date for child_dob
        $validated['child_dob'] = $request->child_dob_year . '-01-01';
        unset($validated['child_dob_year']);

        Enrollment::create($validated);

        return redirect()->back()->with('success', 'Đơn đăng ký tư vấn đã được gửi thành công! Chúng tôi sẽ liên hệ với bạn trong vòng 24h.');
    }


}
