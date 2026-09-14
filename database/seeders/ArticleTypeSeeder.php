<?php

namespace Database\Seeders;

use App\Models\ArticleType;
use Illuminate\Database\Seeder;

class ArticleTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'การทำงาน', 'slug' => 'work', 'description' => 'เปลี่ยนประสบการณ์ให้เป็นบทเรียน', 'tone' => 'มืออาชีพ'],
            ['name' => 'ความรัก', 'slug' => 'love', 'description' => 'เล่าเรื่องความรู้สึกอย่างจริงใจ', 'tone' => 'อบอุ่น'],
            ['name' => 'การต่อสู้ชีวิต', 'slug' => 'life', 'description' => 'ส่งต่อพลังให้คนที่กำลังเดินต่อ', 'tone' => 'สร้างแรงบันดาลใจ'],
            ['name' => 'การดำรงชีวิต', 'slug' => 'lifestyle', 'description' => 'จัดระเบียบวันธรรมดาให้มีความหมาย', 'tone' => 'เป็นกันเอง'],
            ['name' => 'นิยาย', 'slug' => 'fiction', 'description' => 'สร้างโลกใหม่จากจินตนาการ', 'tone' => 'สร้างสรรค์'],
            ['name' => 'หนังสือพิมพ์', 'slug' => 'news', 'description' => 'เล่าข่าวอย่างชัดเจนและเป็นกลาง', 'tone' => 'เป็นกลาง'],
            ['name' => 'การศึกษา', 'slug' => 'education', 'description' => 'อธิบายเรื่องยากให้เข้าใจง่าย', 'tone' => 'ให้ความรู้'],
            ['name' => 'เทคโนโลยี', 'slug' => 'technology', 'description' => 'สำรวจสิ่งใหม่ที่กำลังเปลี่ยนโลก', 'tone' => 'ทันสมัย'],
            ['name' => 'สุขภาพ', 'slug' => 'health', 'description' => 'แบ่งปันความรู้เพื่อชีวิตที่ดีขึ้น', 'tone' => 'เข้าใจง่าย'],
            ['name' => 'ธุรกิจ', 'slug' => 'business', 'description' => 'เปลี่ยนไอเดียให้เป็นโอกาส', 'tone' => 'มืออาชีพ'],
        ];

        foreach ($types as $type) {
            ArticleType::updateOrCreate(
                ['name' => $type['name']],
                [
                    'slug' => $type['slug'],
                    'description' => $type['description'],
                    'tone' => $type['tone'],
                    'is_active' => true,
                ]
            );
        }
    }
}
