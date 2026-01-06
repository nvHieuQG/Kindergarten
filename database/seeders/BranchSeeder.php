<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'name' => 'Cơ sở 1 - Cầu Giấy',
            'address' => 'Số 10, Ngõ 100, Đường Cầu Giấy, Hà Nội',
            'phone' => '024 3333 4444',
            'email' => 'caugiay@hoahuongduong.edu.vn',
            'order' => 1,
        ]);

        Branch::create([
            'name' => 'Cơ sở 2 - Thanh Xuân',
            'address' => 'Số 20, Phố Nguyễn Trãi, Thanh Xuân, Hà Nội',
            'phone' => '024 3333 5555',
            'email' => 'thanhxuan@hoahuongduong.edu.vn',
            'order' => 2,
        ]);

        Branch::create([
            'name' => 'Cơ sở 3 - Hà Đông',
            'address' => 'Số 30, Đường Quang Trung, Hà Đông, Hà Nội',
            'phone' => '024 3333 6666',
            'email' => 'hadong@hoahuongduong.edu.vn',
            'order' => 3,
        ]);
    }
}
