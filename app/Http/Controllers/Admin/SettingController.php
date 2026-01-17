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
            'site_name' => 'required|string|max:255',
            'about_title' => 'required|string|max:255',
            'about_content' => 'required|string',
            'about_video' => 'nullable|url|max:255',

            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string',
            'hero_form_title' => 'required|string|max:255',
            'about_feature_1' => 'nullable|string|max:255',
            'about_feature_2' => 'nullable|string|max:255',
            'about_feature_3' => 'nullable|string|max:255',
            'about_feature_4' => 'nullable|string|max:255',
            'about_feature_5' => 'nullable|string|max:255',
            'about_feature_6' => 'nullable|string|max:255',

            // Contact & Social Validation
            'site_address' => 'nullable|string|max:255',
            'site_phone' => 'nullable|string|max:50',
            'site_email' => 'nullable|email|max:255',
            'social_facebook' => 'nullable|url|max:255',
            'social_youtube' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'zalo_number' => 'nullable|string|max:20',
            'facebook_page_id' => 'nullable|string|max:255',
            'google_maps' => 'nullable|string',




            'stats_exp' => 'nullable|integer|min:0',
            'stats_teachers' => 'nullable|integer|min:0',
            'stats_students' => 'nullable|integer|min:0',
            'stats_satisfaction' => 'nullable|integer|min:0|max:100',
            'gallery_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'gallery_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'gallery_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'gallery_image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'gallery_image_5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'gallery_image_6' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $keys = [
            'site_name',
            'about_title',
            'about_content',
            'about_video',
            'hero_title',
            'hero_subtitle',
            'hero_form_title',
            'site_address',
            'site_phone',
            'site_email',
            'social_facebook',
            'social_youtube',
            'social_instagram',
            'zalo_number',
            'facebook_page_id',
            'google_maps',
            'google_maps',
            'stats_exp',
            'stats_teachers',
            'stats_students',
            'stats_satisfaction',
            'about_feature_1',
            'about_feature_2',
            'about_feature_3',
            'about_feature_4',
            'about_feature_5',
            'about_feature_6',
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

        // Handle Gallery Images
        for ($i = 1; $i <= 6; $i++) {
            $key = 'gallery_image_' . $i;
            if ($request->hasFile($key)) {
                $oldImage = Setting::where('key', $key)->value('value');
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }

                $path = $request->file($key)->store('settings/gallery', 'public');

                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $path, 'type' => 'image']
                );
            }
        }

        return redirect()->back()->with('success', 'Cấu hình đã được cập nhật thành công.');
    }
}
