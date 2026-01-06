<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'about_title',
                'value' => 'Chúng tôi đồng hành cùng bé học tập thông minh để xây dựng tương lai tươi sáng',
                'type' => 'text',
            ],
            [
                'key' => 'about_content',
                'value' => 'Tại Mầm non Hạo Hướng Dương, chúng tôi mang đến môi trường học tập thân thiện, an toàn và sáng tạo. Với chương trình giáo dục hiện đại và đội ngũ giáo viên giàu kinh nghiệm, trẻ được phát triển toàn diện cả về trí tuệ, cảm xúc và thể chất. Chúng tôi luôn nỗ lực tạo ra những trải nghiệm ý nghĩa nhất trong những năm tháng đầu đời của trẻ.',
                'type' => 'textarea',
            ],
            [
                'key' => 'about_image',
                'value' => 'assets/img/about.jpg', // Default image path
                'type' => 'image',
            ],
            ['key' => 'hero_image', 'value' => 'assets/img/hero-img.jpg', 'type' => 'image'],

            // Contact Info
            ['key' => 'site_address', 'value' => '123 Street, New York, USA', 'type' => 'text'],
            ['key' => 'site_phone', 'value' => '+012 345 67890', 'type' => 'text'],
            ['key' => 'site_email', 'value' => 'info@example.com', 'type' => 'text'],

            // Social Links
            ['key' => 'social_facebook', 'value' => 'https://facebook.com', 'type' => 'text'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
