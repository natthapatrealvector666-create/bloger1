# AI Article Writer Web — Project Skill v2.0

## 1. แนวคิดใหม่ของระบบ

โปรเจกต์นี้เป็น Web Application สำหรับช่วยผู้ใช้คิดและเขียนบทความด้วย AI

**ไม่มีระบบสมัครสมาชิก และไม่มีระบบ Login**

เมื่อผู้ใช้เปิดเว็บไซต์:

Landing Page → กด "เริ่มเขียนบทความ" → เข้า Article Workspace ได้ทันที → เลือกประเภทบทความ → ใส่หัวข้อ/แนวคิด → AI ช่วยคิดและเขียน → ผู้ใช้แก้ไข → Preview → Export PDF / Word / EPUB

เป้าหมายคือทำให้ผู้ใช้สามารถ "เปิดเว็บแล้วเริ่มเขียนได้ทันที" โดยไม่มีขั้นตอน Login ที่ไม่จำเป็น

---

# 2. รูปแบบการเก็บบทความ

เนื่องจากไม่มี Login ระบบต้องกำหนดวิธีระบุและเก็บบทความใหม่

## แนวทางแนะนำสำหรับ MVP

ใช้ Browser Storage ก่อน เช่น:
- LocalStorage สำหรับข้อมูลขนาดเล็ก
- IndexedDB สำหรับบทความ/ข้อมูลที่มีขนาดใหญ่กว่า

ข้อดี:
- ไม่ต้องสร้างระบบ Account
- ไม่ต้องมี User Table
- ผู้ใช้เปิดเว็บแล้วใช้งานได้เลย
- เหมาะกับ Demo / School Project / MVP

ข้อเสีย:
- เปลี่ยนเครื่องหรือ Browser แล้วข้อมูลอาจไม่ตามไป
- Clear Browser Data แล้วข้อมูลอาจหาย

## แนวทางสำหรับเวอร์ชัน Production

ใช้ Anonymous Session + Database

Browser → Anonymous Session ID → Laravel Backend → Database

ยังคงไม่ต้องสมัครสมาชิก แต่สามารถเก็บบทความบน Server ได้

---

# 3. หน้าที่ต้องมี

## Public
- Landing Page
- Article Workspace
- Article Preview

## System
- AI Writer
- Article CRUD
- Export System

## Optional Admin

หากทำระบบหลังบ้านในอนาคต สามารถเพิ่ม Admin Login แยกต่างหากได้ ผู้ใช้ทั่วไปยังไม่ต้อง Login

---

# 4. Landing Page

หน้าแรกควรสื่อสารให้ชัดว่า:

**"คิดบทความไม่ออก ให้ AI ช่วยคุณเริ่มต้น"**

องค์ประกอบ:

### Hero

หัวข้อ:
AI ช่วยคิดและเขียนบทความของคุณ

ข้อความ:
เลือกแนวบทความ ใส่ไอเดีย แล้วให้ AI ช่วยสร้างเนื้อหาตั้งแต่หัวข้อจนถึงบทความฉบับสมบูรณ์

ปุ่ม:
- เริ่มเขียนบทความ
- ดูตัวอย่าง

### Article Type Cards

แสดงประเภทบทความที่ระบบรองรับ:
- การทำงาน
- ความรัก
- การต่อสู้ชีวิต
- การดำรงชีวิต
- นิยาย
- หนังสือพิมพ์
- การศึกษา
- เทคโนโลยี
- สุขภาพ
- ธุรกิจ

---

# 5. Article Types

ควรออกแบบ `article_types` ให้เพิ่มประเภทใหม่ได้ในอนาคต

ฟิลด์:
- id
- name
- slug
- description
- ai_prompt
- tone
- structure
- is_active
- created_at
- updated_at

ตัวอย่าง:

## การทำงาน
Tone: Professional
Structure: Introduction / Main Point / Examples / Conclusion

## ความรัก
Tone: Warm / Emotional
Structure: Introduction / Situation / Emotion / Advice / Conclusion

## การต่อสู้ชีวิต
Tone: Inspirational
Structure: Problem / Struggle / Turning Point / Lesson / Conclusion

## นิยาย
Tone: Creative / Narrative
Structure: Title / Opening / Characters / Setting / Conflict / Climax / Ending

## หนังสือพิมพ์
Tone: Objective / Informative
Structure: Headline / Lead / Main News / Supporting Information / Conclusion

---

# 6. Article Workspace

นี่คือหน้าหลักของระบบ แบ่งเป็น 3 ส่วน

## Left Sidebar
- ประเภทบทความ
- หัวข้อ
- Keyword
- กลุ่มผู้อ่าน
- Tone
- ความยาว
- รูปแบบบทความ

## Center
- Title
- Content
- Rich Text Editor

## Right Sidebar — AI Assistant
ปุ่ม:
- คิดหัวข้อ
- สร้างชื่อเรื่อง
- สร้าง Outline
- เขียนบทความ
- เขียนต่อ
- สรุป
- ขยายเนื้อหา
- ย่อเนื้อหา
- เปลี่ยน Tone
- ปรับภาษา
- แก้ Grammar

---

# 7. Article CRUD

ระบบต้องรองรับ CRUD

## Create
สร้างบทความใหม่

## Read
- รายการบทความ
- อ่านบทความ
- Preview

## Update
- แก้ชื่อ
- แก้ประเภท
- แก้เนื้อหา
- แก้สถานะ

## Delete
ลบบทความ แนะนำให้ใช้ Soft Delete หากมี Database

---

# 8. Article Status

ใช้สถานะ:
- draft
- published
- archived

สำหรับ MVP อาจใช้แค่ `draft` ก่อน แล้วค่อยเพิ่ม Published/Archived

---

# 9. Database สำหรับ Production

ไม่มี users table ใน MVP

## article_types
- id
- name
- slug
- description
- ai_prompt
- tone
- structure
- is_active
- created_at
- updated_at

## articles
- id
- session_id
- article_type_id
- title
- slug
- excerpt
- content
- status
- cover_image
- created_at
- updated_at
- deleted_at

## article_versions
- id
- article_id
- title
- content
- version
- created_at

## ai_generations
- id
- session_id
- article_id
- prompt
- response
- model
- token_usage
- created_at

## exports
- id
- session_id
- article_id
- format
- file_path
- created_at

หมายเหตุ: `session_id` ใช้แทนผู้ใช้ในระบบ Anonymous

---

# 10. AI Architecture

**ห้ามนำ API Key ไปไว้ใน Frontend**

Frontend → Laravel Backend → AI Service → AI Provider → Laravel → Frontend

ตัวอย่าง:

POST /api/ai/generate

Request:

{
  "article_type": "life",
  "title": "อย่ายอมแพ้ในวันที่ชีวิตไม่เป็นใจ",
  "keywords": ["กำลังใจ", "ชีวิต", "การต่อสู้"],
  "tone": "inspirational",
  "length": "medium"
}

Backend สร้าง Prompt → ส่งไป AI → รับผลลัพธ์ → ส่งกลับ Frontend

---

# 11. AI Prompt Architecture

อย่าเขียน Prompt ทั้งหมดไว้ในหน้า Frontend

Backend ควรสร้าง Prompt จาก:

System Prompt + Article Type Prompt + User Input + Article Context + Existing Content

ตัวอย่าง:

System Prompt:
คุณเป็นผู้ช่วยเขียนบทความภาษาไทย

Article Type:
การต่อสู้ชีวิต

Style:
ให้กำลังใจ เข้าใจง่าย มีตัวอย่างและข้อคิด

User Input:
หัวข้อ = อย่ายอมแพ้ในวันที่ชีวิตไม่เป็นใจ

ความยาว:
ประมาณ 1,500 คำ

---

# 12. AI Workflow

ไม่ควรให้ AI เขียนบทความทั้งหมดจาก Prompt เดียวทันที

Step 1 เลือกประเภท
Step 2 ใส่หัวข้อหรือแนวคิด
Step 3 AI เสนอชื่อเรื่อง
Step 4 AI สร้าง Outline
Step 5 ผู้ใช้เลือก/แก้ Outline
Step 6 AI เขียนแต่ละ Section
Step 7 ผู้ใช้แก้ไข
Step 8 AI ช่วยปรับปรุง
Step 9 Save
Step 10 Preview
Step 11 Export

---

# 13. AI Service ที่แนะนำสำหรับโปรเจกต์

ณ เดือนกันยายน 2026 มีตัวเลือกที่เหมาะกับโปรเจกต์นี้หลายแบบ

## ตัวเลือกที่ 1 — Google Gemini API

**แนะนำเป็นตัวเลือกแรกสำหรับโปรเจกต์นี้**

เหตุผล:
- มี Free Tier สำหรับนักพัฒนาและโปรเจกต์ขนาดเล็ก
- ใช้งานผ่าน Google AI Studio ได้
- มี API Key
- เหมาะกับงานเขียนบทความ
- เอกสารค่อนข้างชัดเจน
- สามารถเริ่มต้นโดยไม่ต้องจ่ายเงินภายใต้โควต้าฟรี

ข้อควรระวัง:
- Free Tier มีข้อจำกัดด้านโควต้าและบางโมเดล
- โควต้า/สิทธิ์ของโมเดลอาจเปลี่ยนได้
- อย่าใส่ API Key ใน JavaScript ฝั่ง Browser

แหล่งข้อมูล:
https://ai.google.dev/gemini-api/docs/pricing

## ตัวเลือกที่ 2 — OpenRouter

เหมาะมากสำหรับโปรเจกต์ที่ต้องการเปลี่ยน AI Model ได้หลายตัว

ข้อดี:
- มี Free Models
- มี API แบบ OpenAI-compatible
- สามารถเปลี่ยน Model ได้โดยไม่ต้องเปลี่ยน architecture ของเว็บมาก
- มี `openrouter/free` สำหรับเลือกจากโมเดลฟรีที่มีอยู่

Free Plan ปัจจุบันระบุ:
- 25+ free models
- Free models only
- Rate limit 50 requests/day

ข้อควรระวัง:
- Free Model อาจเปลี่ยนแปลงได้
- ความเร็วและความเสถียรขึ้นกับโมเดล/Provider
- 50 requests/day ไม่เหมาะกับเว็บไซต์ที่มีผู้ใช้งานจำนวนมาก

แหล่งข้อมูล:
https://openrouter.ai/pricing
https://openrouter.ai/openrouter/free

---

# 14. AI Provider ที่เลือกสำหรับ MVP

### Primary
Google Gemini API

### Fallback
OpenRouter

Architecture:

AIWriterService → GeminiProvider

ถ้าอนาคตต้องเปลี่ยน:

AIWriterService → OpenRouterProvider

หลักการสำคัญ: อย่าเขียนโค้ดระบบทั้งหมดผูกกับ Provider ตัวเดียว

---

# 15. AI Service Layer

สร้าง:

app/Services/AI/

ไฟล์:
- AIWriterService.php
- PromptBuilderService.php
- GeminiProvider.php
- OpenRouterProvider.php

ตัวอย่างแนวคิด:

AIWriterService → เลือก Provider → ส่ง Prompt → รับ Response → Normalize Response → ส่งกลับ Controller

ข้อดี: อนาคตเปลี่ยน Gemini → OpenRouter → Provider อื่น ได้ง่าย

---

# 16. Rate Limit

เพราะไม่มี Login ต้องป้องกันคนยิง API จำนวนมาก

ตัวอย่าง:
- จำกัดจำนวน AI Request ต่อ IP
- จำกัด Request ต่อ Session ID
- จำกัดความยาว Prompt
- จำกัดความยาว Output
- Cooldown ระหว่างการกด Generate
- ตรวจสอบ HTTP Request

ตัวอย่าง MVP:
`10 AI Requests / Session / ชั่วโมง`

ค่าจริงควรปรับตาม Free Tier ของ Provider ที่เลือก

---

# 17. API Endpoints

POST /api/ai/title — สร้างชื่อเรื่อง
POST /api/ai/outline — สร้าง Outline
POST /api/ai/generate — สร้างบทความ
POST /api/ai/rewrite — ปรับปรุงข้อความ
POST /api/ai/summarize — สรุปบทความ
POST /api/ai/continue — เขียนต่อ

POST /api/articles — สร้างบทความ
GET /api/articles — รายการบทความ
GET /api/articles/{id} — ดูบทความ
PUT /api/articles/{id} — แก้บทความ
DELETE /api/articles/{id} — ลบบทความ
GET /api/articles/{id}/preview — Preview
GET /api/articles/{id}/export/pdf — Export PDF
GET /api/articles/{id}/export/docx — Export Word
GET /api/articles/{id}/export/epub — Export EPUB

---

# 18. Rich Text Editor

ควรมี:
- Heading
- Bold
- Italic
- Underline
- List
- Quote
- Link
- Image
- Alignment
- Undo / Redo
- Code Block (optional)

ควรเก็บ Content ในรูปแบบที่แปลงเป็น HTML/Document ได้ง่าย

---

# 19. Preview

ก่อน Export ต้องมี Preview

Preview ต้องแสดงผลใกล้เคียงไฟล์จริง

องค์ประกอบ:
- Cover
- Title
- Author
- Article Type
- Content
- Images
- Page Break
- Footer
- Page Number

---

# 20. Export System

ทำหลังจาก CRUD + Editor + Preview เสร็จ

## PDF
HTML/Template → PDF Generator → PDF File

รองรับ:
- A4
- Font ภาษาไทย
- Margin
- Header
- Footer
- Page Number
- Cover

## Word
สร้าง `.docx` รองรับ:
- Title
- Heading
- Paragraph
- Images
- Page Break

## Ebook
แนะนำเริ่มจาก EPUB

โครงสร้าง:
book/
├── metadata
├── cover
├── chapters
└── styles

---

# 21. Development Phases

## Phase 1 — Requirement
กำหนด User Flow / Feature / Article Types / AI Flow / Export Flow

## Phase 2 — UI/UX
สร้าง Landing Page / Article Workspace / Editor / AI Sidebar / Preview

## Phase 3 — Project Setup
ติดตั้ง Laravel / Frontend / Database / Rich Text Editor

## Phase 4 — Article Type
สร้าง Article Type และระบบจัดการประเภท

## Phase 5 — Article CRUD
ทำ Create / Read / Update / Delete

## Phase 6 — Editor
สร้าง Rich Text Editor

## Phase 7 — Preview
ทำ Preview ให้สมบูรณ์

## Phase 8 — AI
เริ่มเชื่อม Gemini API
ทำ Title / Outline / Generate / Rewrite / Summarize / Continue

## Phase 9 — Export
ทำ PDF → Word → EPUB

## Phase 10 — Anonymous Storage
เริ่มต้น Browser Storage แล้วค่อยเพิ่ม Anonymous Session + Database

## Phase 11 — Security
API Key Protection / Validation / Rate Limit / XSS Protection / HTML Sanitization / Upload Validation

## Phase 12 — Testing
ทดสอบ Create / Read / Update / Delete / AI / Preview / PDF / Word / EPUB / Rate Limit / Error Handling

## Phase 13 — Deployment
Deploy Frontend + Laravel Backend + Database + AI API

---

# 22. MVP

เวอร์ชันแรกให้ทำ:
1. Landing Page
2. Start Writing
3. Article Type
4. Article CRUD
5. Rich Text Editor
6. Gemini AI
7. Generate Title
8. Generate Outline
9. Generate Article
10. Rewrite
11. Preview
12. Export PDF
13. Export Word

จากนั้นค่อยเพิ่ม:
- EPUB
- Version History
- Cover Generator
- AI Image
- Anonymous Cloud Storage
- Admin Dashboard
- Analytics
- Public Sharing

---

# 23. ลำดับการทำงานที่แนะนำที่สุด

Landing Page
↓
Article Workspace
↓
Article Type
↓
Article CRUD
↓
Editor
↓
Preview
↓
Gemini API
↓
AI Tools
↓
PDF
↓
Word
↓
EPUB
↓
Security
↓
Testing
↓
Deployment

---

# 24. Project Structure

app/
├── Http/
│   ├── Controllers/
│   └── Requests/
├── Models/
├── Services/
│   ├── AI/
│   │   ├── AIWriterService.php
│   │   ├── PromptBuilderService.php
│   │   ├── GeminiProvider.php
│   │   └── OpenRouterProvider.php
│   ├── Article/
│   │   └── ArticleService.php
│   └── Export/
│       ├── PdfExportService.php
│       ├── WordExportService.php
│       └── EpubExportService.php
└── Policies/

resources/
├── views/
└── js/

routes/
├── web.php
└── api.php

---

# 25. Security Rules

แม้ไม่มี Login ก็ต้องมี Security

1. API Key ต้องอยู่ใน `.env`
2. ห้ามส่ง API Key ไป Frontend
3. Validate ทุก Request
4. จำกัด Prompt Length
5. จำกัด Output Length
6. Rate Limit AI API
7. Sanitize HTML
8. ตรวจสอบ Upload
9. ป้องกัน XSS
10. ป้องกัน Abuse จาก Anonymous User

---

# 26. MVP Data Strategy ที่แนะนำ

สำหรับโปรเจกต์นักศึกษา/Prototype:

### เริ่มต้น
Browser Storage + Gemini API ผ่าน Backend

เมื่อระบบเริ่มสมบูรณ์:
Anonymous Session + PostgreSQL/MySQL

จึงค่อยเพิ่ม Cloud Storage หากจำเป็น

วิธีนี้ช่วยลดความซับซ้อนในช่วงเริ่มต้นอย่างมาก

---

# 27. Final User Experience

ผู้ใช้ควรรู้สึกว่า:

เปิดเว็บ → เห็น Landing Page → กด "เริ่มเขียน" → เลือก "ความรัก" → พิมพ์ "ความสัมพันธ์ที่เริ่มห่างกัน" → กด "ให้ AI ช่วยคิด" → ได้ชื่อเรื่องหลายแบบ → เลือกชื่อ → AI สร้าง Outline → กด "เขียนบทความ" → ได้บทความ → แก้ไขใน Editor → Preview → Export PDF / Word / EPUB

**ไม่ต้องสมัครสมาชิก**
**ไม่ต้อง Login**
**ไม่ต้องกรอกข้อมูลผู้ใช้ก่อนเริ่มใช้งาน**

---

# 28. จุดเริ่มต้นในการลงมือทำ

เริ่มจากเอกสารเหล่านี้:
- 01-requirements.md
- 02-user-flow.md
- 03-ui-wireframe.md
- 04-database.md
- 05-ai-prompt.md
- 06-api.md
- 07-export.md
- 08-development-plan.md

จากนั้นเริ่ม:

**Step 1 — สร้าง Landing Page**

แล้วค่อย:

**Step 2 — สร้าง Article Workspace**

จากนั้น:

**Step 3 — ทำ Article CRUD**

และเมื่อ CRUD ใช้งานได้แล้ว:

**Step 4 — เชื่อม Gemini API**

---

# 29. หลักสำคัญของโปรเจกต์

- No Registration
- No Login
- Anonymous First
- CRUD First
- AI Second
- Preview Before Export
- AI API ผ่าน Backend เท่านั้น
- Provider ต้องเปลี่ยนได้
- Article Type ต้องเพิ่มได้
- Export เป็น Service แยก
- Security ต้องเริ่มตั้งแต่วันแรก
- ทำ MVP ก่อนค่อยเพิ่ม Feature
