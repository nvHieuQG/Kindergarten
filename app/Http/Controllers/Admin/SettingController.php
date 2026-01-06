<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_title' => 'required|string|max:255',
            'about_content' => 'required|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120|dimensions:min_width=1200',

            // Contact & Social Validation
            'site_address' => 'nullable|string|max:255',
            'site_phone' => 'nullable|string|max:50',
            'site_email' => 'nullable|email|max:255',
            'social_facebook' => 'nullable|url|max:255',
            'social_youtube' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
        ]);

        $keys = [
            'about_title',
            'about_content',
            'site_address',
            'site_phone',
            'site_email',
            'social_facebook',
            'social_youtube',
            'social_instagram'
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $request->input($key), 'type' => 'text'] // Default type text for simplicity
                );
            }
        }

        // Specific handling for textareas if needed, but loop covers basic text
        Setting::updateOrCreate(
            ['key' => 'about_content'],
            ['value' => $request->about_content, 'type' => 'textarea']
        );

        // Update Image
        if ($request->hasFile('about_image')) {
            $oldImage = Setting::where('key', 'about_image')->value('value');
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }

            $path = $request->file('about_image')->store('settings', 'public');

            Setting::updateOrCreate(
                ['key' => 'about_image'],
                ['value' => $path, 'type' => 'image']
            );
        }

        // Update Hero Image
        if ($request->hasFile('hero_image')) {
            $oldHeroImage = Setting::where('key', 'hero_image')->value('value');
            if ($oldHeroImage && Storage::disk('public')->exists($oldHeroImage)) {
                Storage::disk('public')->delete($oldHeroImage);
            }

            $heroPath = $request->file('hero_image')->store('settings', 'public');

            Setting::updateOrCreate(
                ['key' => 'hero_image'],
                ['value' => $heroPath, 'type' => 'image']
            );
        }

        return redirect()->back()->with('success', 'Cấu hình đã được cập nhật thành công.');
    }
}
