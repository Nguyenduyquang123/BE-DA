<?php

namespace Database\Seeders;

use App\Models\Categories;
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
            ['name' => 'Danh mục sản phẩm', 'slug' => 'đan-muc-san-pham'],
            ['name' => 'Trang chủ', 'slug' => 'trang-chu'],
            ['name' => 'Toshiko thương hiệu nổi tiếng châu á', 'slug' => 'toshiko-thuong-hieu-noi-tieng-chau-a'],
            ['name' => 'Hệ thống showroom toàn quốc', 'slug' => 'he-thong-showroom-toan-quoc'],
        ];

        foreach ($categories as $cate) {
            Categories::create($cate);
        }
    }
}
