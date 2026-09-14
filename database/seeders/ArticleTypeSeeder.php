<?php

namespace Database\Seeders;

use App\Models\ArticleType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['การทำงาน', 'เปลี่ยนประสบการณ์ให้เป็นบทเรียน', 'มืออาชีพ'],
            ['ความรัก', 'เล่าเรื่องความรู้สึกอย่างจริงใจ', 'อบอุ่น'],
            ['การต่อสู้ชีวิต', 'ส่งต่อพลังให้คนที่กำลังเดินต่อ', 'สร้างแรงบันดาลใจ'],
            ['การดำรงชีวิต', 'จัดระเบียบวันธรรมดาให้มีความหมาย', 'เป็นกันเอง'],
            ['นิยาย', 'สร้างโลกใหม่จากจินตนาการ', 'สร้างสรรค์'],
            ['หนังสือพิมพ์', 'เล่าข่าวอย่างชัดเจนและเป็นกลาง', 'เป็นกลาง'],
            ['การศึกษา', 'อธิบายเรื่องยากให้เข้าใจง่าย', 'ให้ความรู้'],
            ['เทคโนโลยี', 'สำรวจสิ่งใหม่ที่กำลังเปลี่ยนโลก', 'ทันสมัย'],
            ['สุขภาพ', 'แบ่งปันความรู้เพื่อชีวิตที่ดีขึ้น', 'เข้าใจง่าย'],
            ['ธุรกิจ', 'เปลี่ยนไอเดียให้เป็นโอกาส', 'มืออาชีพ'],
        ];

        foreach ($types as [$name, $description, $tone]) {
            ArticleType::updateOrCreate(
                ['name' => $name],
                ['slug' => Str::slug($name) ?: 'type-'.Str::slug(urlencode($name)), 'description' => $description, 'tone' => $tone, 'is_active' => true],
            );
        }
    }
}
