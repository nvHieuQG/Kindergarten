<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Hoạt động vui chơi',
            'Góc học tập',
            'Dinh dưỡng cho bé',
            'Sự kiện nhà trường',
            'Thông báo chung',
        ];

        foreach ($categories as $category) {
            \App\Models\Category::firstOrCreate(['name' => $category], ['slug' => \Illuminate\Support\Str::slug($category)]);
        }
    }
}
