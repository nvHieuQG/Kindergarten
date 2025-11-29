<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Teacher;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $recentPosts = Post::published()->latest()->take(3)->get();
        $teachers = Teacher::active()->ordered()->take(4)->get();
        $upcomingEvents = Event::upcoming()->take(3)->get();

        return view('frontend.home', compact('recentPosts', 'teachers', 'upcomingEvents'));
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

    public function events()
    {
        $events = Event::upcoming()->paginate(9);
        return view('frontend.event', compact('events'));
    }

    public function blog()
    {
        $posts = Post::published()->latest()->paginate(9);
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
        return view('frontend.contact');
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

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
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

        return redirect()->back()->with('success', 'Enrollment application submitted successfully! We will contact you soon.');
    }
}
