<?php

namespace App\Services\AI;

class PromptBuilderService
{
    /**
     * Build prompt for generating article title.
     */
    public function buildTitlePrompt(string $articleType, array $keywords, string $tone, string $topic): string
    {
        return "คุณเป็นผู้ช่วยเขียนบทความภาษาไทยที่เชี่ยวชาญ
ประเภทบทความ: {$articleType}
น้ำเสียง/สไตล์ (Tone): {$tone}
คำสำคัญ (Keywords): " . implode(', ', $keywords) . "
หัวข้อหลัก: {$topic}

กรุณาสร้างชื่อเรื่องที่น่าสนใจ 5 ตัวเลือก (ตอบมาเฉพาะชื่อเรื่อง เป็น bullet หรือ list เรียงข้อ ไม่ต้องมีคำอธิบายเพิ่มเติม)";
    }

    /**
     * Build prompt for generating article outline.
     */
    public function buildOutlinePrompt(string $articleType, string $title, string $tone): string
    {
        return "คุณเป็นผู้ช่วยเขียนบทความภาษาไทยที่เชี่ยวชาญ
ประเภทบทความ: {$articleType}
น้ำเสียง/สไตล์ (Tone): {$tone}
ชื่อเรื่อง: {$title}

กรุณาสร้างเค้าโครง (Outline) ของบทความนี้ แบ่งเป็นหัวข้อหลักและหัวข้อย่อยให้ชัดเจน เหมาะสำหรับนำไปเขียนเป็นบทความฉบับสมบูรณ์";
    }

    /**
     * Build prompt for generating the full article.
     */
    public function buildArticlePrompt(string $articleType, string $title, string $outline, string $tone, string $length): string
    {
        return "คุณเป็นผู้ช่วยเขียนบทความภาษาไทยที่เชี่ยวชาญ
ประเภทบทความ: {$articleType}
น้ำเสียง/สไตล์ (Tone): {$tone}
ชื่อเรื่อง: {$title}
ความยาวที่ต้องการ: {$length}

เค้าโครงบทความ (Outline):
{$outline}

กรุณาเขียนบทความฉบับสมบูรณ์ตามเค้าโครงด้านบน โดยใช้น้ำเสียงที่กำหนด และใช้รูปแบบ Markdown ในการจัดหน้า (เช่น ใช้ # หรือ ## สำหรับหัวข้อ)";
    }

    /**
     * Build prompt for rewriting or improving text.
     */
    public function buildRewritePrompt(string $text, string $instruction): string
    {
        return "กรุณาปรับปรุงหรือเขียนข้อความด้านล่างนี้ใหม่ตามคำสั่งต่อไปนี้
คำสั่ง: {$instruction}

ข้อความต้นฉบับ:
{$text}";
    }
}
