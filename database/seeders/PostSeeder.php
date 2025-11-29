<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have categories first, or let the factory create them
        // Here we'll just create posts, and the factory will create categories if needed
        // But better to use existing categories if possible to avoid too many categories

        $categories = \App\Models\Category::all();

        if ($categories->count() == 0) {
            $categories = \App\Models\Category::factory()->count(5)->create();
        }

        $posts = [
            [
                'title' => 'Lễ khai giảng năm học mới 2025-2026',
                'excerpt' => 'Không khí hân hoan của ngày tựu trường tại Mầm non Hạo Hướng Dương.',
                'content' => 'Sáng ngày 5/9, trường Mầm non Hạo Hướng Dương long trọng tổ chức lễ khai giảng năm học mới. Các bé được tham gia nhiều hoạt động vui chơi, văn nghệ đặc sắc...',
            ],
            [
                'title' => 'Thực đơn dinh dưỡng tuần này cho bé',
                'excerpt' => 'Khám phá thực đơn phong phú, đầy đủ dinh dưỡng cho các bé trong tuần này.',
                'content' => 'Dinh dưỡng là yếu tố quan trọng hàng đầu. Tuần này, nhà trường bổ sung thêm các món ăn giàu vitamin và khoáng chất...',
            ],
            [
                'title' => 'Hoạt động ngoại khóa: Tham quan vườn bách thú',
                'excerpt' => 'Các bé đã có một ngày trải nghiệm thú vị tại vườn bách thú thành phố.',
                'content' => 'Chuyến đi giúp các bé khám phá thế giới động vật, học cách yêu thương thiên nhiên và rèn luyện kỹ năng làm việc nhóm...',
            ],
            [
                'title' => 'Hướng dẫn phụ huynh chăm sóc trẻ khi giao mùa',
                'excerpt' => 'Những lưu ý quan trọng để bảo vệ sức khỏe cho bé khi thời tiết thay đổi.',
                'content' => 'Giao mùa là thời điểm trẻ dễ ốm. Phụ huynh cần chú ý giữ ấm, bổ sung vitamin C và cho trẻ uống đủ nước...',
            ],
            [
                'title' => 'Cuộc thi vẽ tranh: Ước mơ của bé',
                'excerpt' => 'Những bức tranh đầy màu sắc và sáng tạo của các họa sĩ nhí.',
                'content' => 'Cuộc thi đã nhận được hơn 100 tác phẩm dự thi. Mỗi bức tranh là một câu chuyện ngộ nghĩnh về ước mơ của các bé...',
            ],
        ];

        foreach ($posts as $postData) {
            $category = $categories->random();
            \App\Models\Post::create([
                'title' => $postData['title'],
                'slug' => \Illuminate\Support\Str::slug($postData['title']),
                'excerpt' => $postData['excerpt'],
                'content' => $postData['content'],
                'category_id' => $category->id,
                'user_id' => 1, // Assuming admin user with ID 1 exists
                'status' => 'published',
                'featured_image' => null, // Or add a default image path if available
            ]);
        }
    }
}
