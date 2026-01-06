<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Học & Chơi',
                'description' => 'Chương trình học được thiết kế sinh động, kết hợp giữa học và chơi để giúp trẻ tiếp thu kiến thức tự nhiên, phát triển tư duy và kỹ năng xã hội thông qua các trò chơi giáo dục.',
                'icon' => 'fas fa-gamepad',
            ],
            [
                'title' => 'Chương trình A đến Z',
                'description' => 'Hệ thống chương trình từ A đến Z, bao gồm học tập, thể chất, nghệ thuật và khám phá khoa học – giúp trẻ phát triển đầy đủ về trí tuệ lẫn cảm xúc.',
                'icon' => 'fas fa-sort-alpha-down',
            ],
            [
                'title' => 'Giáo viên chuyên nghiệp',
                'description' => 'Đội ngũ giáo viên giàu kinh nghiệm, tận tâm và yêu trẻ. Mỗi cô giáo là một người đồng hành, hướng dẫn và tạo cảm hứng học tập cho các bé mỗi ngày.',
                'icon' => 'fas fa-users',
            ],
            [
                'title' => 'Sức khỏe tinh thần',
                'description' => 'Chúng tôi đặc biệt chú trọng sức khỏe tinh thần của trẻ. Các hoạt động trải nghiệm, giao tiếp và thư giãn giúp trẻ hình thành sự tự tin, cảm xúc tích cực và khả năng thích ứng tốt.',
                'icon' => 'fas fa-user-nurse',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
