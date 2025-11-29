<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Nguyễn Thị Lan',
                'position' => 'Hiệu trưởng',
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
            ],
            [
                'name' => 'Trần Văn Minh',
                'position' => 'Giáo viên Thể chất',
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
            ],
            [
                'name' => 'Lê Thị Hoa',
                'position' => 'Giáo viên Mầm non',
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
            ],
            [
                'name' => 'Phạm Thị Mai',
                'position' => 'Giáo viên Âm nhạc',
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
            ],
            [
                'name' => 'Hoàng Văn Nam',
                'position' => 'Giáo viên Tiếng Anh',
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
            ],
        ];

        foreach ($teachers as $teacher) {
            \App\Models\Teacher::firstOrCreate(['name' => $teacher['name']], $teacher);
        }
    }
}
