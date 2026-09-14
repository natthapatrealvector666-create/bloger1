<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เขียนดี | ผู้ช่วยเขียนบทความด้วย AI</title>
    <meta name="description" content="เลือกแนวบทความ ใส่ไอเดียสั้น ๆ แล้วให้ AI ช่วยคุณเริ่มต้นเขียน ไม่ต้องสมัครสมาชิก">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Remix Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #7a5af8;
            --primary-light: #efeaff;
            --primary-dark: #5b3fd1;
            --heading: #1e1b4b;
            --body-bg: #fbfbfe;
            --card-shadow: 0 4px 24px rgba(122,90,248,.10);
        }
        * { box-sizing: border-box; }
        body {
            font-family: 'Noto Sans Thai', 'Inter', sans-serif;
            background: var(--body-bg);
            color: #374151;
            margin: 0;
        }

        /* NAV */
        .site-nav {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(122,90,248,.10);
            padding: 0 1.5rem;
        }
        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: .6rem;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.15rem;
            color: var(--heading);
        }
        .brand-icon {
            width: 36px; height: 36px;
            background: var(--primary);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 700;
        }
        .nav-links { display: flex; gap: 2rem; list-style: none; margin: 0; padding: 0; }
        .nav-links a { text-decoration: none; color: #4b5563; font-weight: 500; font-size: .92rem; transition: color .2s; }
        .nav-links a:hover { color: var(--primary); }
        .btn-primary-custom {
            background: var(--primary);
            color: #fff;
            padding: .5rem 1.4rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: .9rem;
            transition: background .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 2px 12px rgba(122,90,248,.3);
        }
        .btn-primary-custom:hover {
            background: var(--primary-dark);
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(122,90,248,.4);
        }

        /* HERO */
        .hero {
            background: linear-gradient(160deg, #f3f0ff 0%, #fbfbfe 60%);
            padding: 7rem 1.5rem 5rem;
            overflow: hidden;
            position: relative;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(122,90,248,.12) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .hero-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }
        .ai-badge {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: var(--primary-light);
            color: var(--primary);
            padding: .35rem 1rem;
            border-radius: 50px;
            font-size: .82rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
        }
        .hero-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            color: var(--heading);
            line-height: 1.2;
            margin-bottom: 1.25rem;
            letter-spacing: -.02em;
        }
        .hero-title em {
            font-style: normal;
            color: var(--primary);
            font-family: Georgia, serif;
            font-weight: 500;
        }
        .hero-sub {
            font-size: 1.05rem;
            color: #6b7280;
            line-height: 1.7;
            margin-bottom: 2rem;
        }
        .btn-group-hero { display: flex; gap: 1rem; flex-wrap: wrap; align-items: center; }
        .btn-outline-custom {
            padding: .65rem 1.6rem;
            border-radius: 50px;
            border: 2px solid #e0d9ff;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            font-size: .95rem;
            transition: all .2s;
        }
        .btn-outline-custom:hover { background: var(--primary-light); border-color: var(--primary); color: var(--primary); }
        .btn-primary-lg {
            padding: .75rem 2rem;
            border-radius: 50px;
            background: var(--primary);
            color: #fff;
            font-weight: 700;
            text-decoration: none;
            font-size: 1rem;
            box-shadow: 0 4px 16px rgba(122,90,248,.35);
            transition: all .2s;
            display: inline-flex; align-items: center; gap: .5rem;
        }
        .btn-primary-lg:hover {
            background: var(--primary-dark);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(122,90,248,.45);
        }
        .no-signup { font-size: .82rem; color: #9ca3af; margin-top: 1rem; display: flex; align-items: center; gap: .35rem; }

        /* HERO CARD */
        .hero-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 40px rgba(122,90,248,.14);
            border: 1px solid rgba(122,90,248,.12);
            overflow: hidden;
            max-width: 500px;
        }
        .hero-card-header {
            padding: .85rem 1.25rem;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fafafa;
        }
        .hero-card-header span { font-weight: 600; font-size: .9rem; color: #374151; }
        .badge-auto { background: #d1fae5; color: #065f46; padding: .25rem .75rem; border-radius: 50px; font-size: .75rem; font-weight: 600; }
        .hero-card-body { padding: 1.75rem; }
        .article-type { color: var(--primary); font-size: .82rem; font-weight: 600; }
        .article-title { font-size: 1.35rem; font-weight: 700; color: var(--heading); line-height: 1.3; margin: .75rem 0 1.25rem; }
        .article-title span { color: var(--primary); }
        .placeholder-lines { margin-bottom: 1.25rem; }
        .ph-line { height: 10px; background: #f3f4f6; border-radius: 50px; margin-bottom: .5rem; animation: pulse 1.8s ease-in-out infinite; }
        .ph-line.w-full { width: 100%; }
        .ph-line.w-4 { width: 80%; }
        .ph-line.w-3 { width: 60%; }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.5} }
        .ai-tip { background: var(--primary-light); border-radius: 10px; padding: .85rem 1rem; font-size: .85rem; color: var(--primary-dark); display: flex; align-items: flex-start; gap: .5rem; }
        .floating-badge {
            position: absolute;
            bottom: -16px;
            right: 24px;
            background: #1f2937;
            color: #fff;
            padding: .6rem 1rem;
            border-radius: 12px;
            font-size: .82rem;
            font-weight: 600;
            box-shadow: 0 4px 16px rgba(0,0,0,.2);
            display: flex; align-items: center; gap: .35rem;
        }
        .hero-card-wrap { position: relative; padding-bottom: 20px; }

        /* FEATURES */
        .section { padding: 5rem 1.5rem; }
        .section-bg { background: #fff; }
        .section-inner { max-width: 1200px; margin: 0 auto; }
        .section-label { color: var(--primary); font-size: .8rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; }
        .section-title { font-size: clamp(1.5rem, 3vw, 2.2rem); font-weight: 700; color: var(--heading); margin: .5rem 0 .75rem; }
        .section-sub { color: #6b7280; font-size: .95rem; max-width: 560px; }

        .feat-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; margin-top: 3rem; }
        .feat-card {
            border-radius: 16px;
            padding: 2rem;
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .feat-card:hover { transform: translateY(-6px); box-shadow: 0 12px 32px rgba(0,0,0,.08); }
        .feat-card.blue { background: #efeaff; }
        .feat-card.cyan { background: #e0f2fe; }
        .feat-card.green { background: #d1fae5; }
        .feat-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            color: #fff;
            margin-bottom: 1.25rem;
        }
        .feat-icon.purple { background: var(--primary); }
        .feat-icon.sky { background: #0284c7; }
        .feat-icon.emerald { background: #059669; }
        .feat-card h3 { font-size: 1.05rem; font-weight: 700; color: var(--heading); margin-bottom: .5rem; }
        .feat-card p { font-size: .9rem; color: #6b7280; line-height: 1.6; margin: 0; }

        /* TYPES */
        .types-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px,1fr)); gap: 1rem; margin-top: 2rem; }
        .type-card {
            background: #fff;
            border: 1.5px solid #f3f4f6;
            border-radius: 14px;
            padding: 1.25rem;
            text-decoration: none;
            color: inherit;
            transition: all .2s ease;
            display: block;
        }
        .type-card:hover {
            border-color: var(--primary);
            box-shadow: 0 4px 20px rgba(122,90,248,.12);
            transform: translateY(-3px);
            color: inherit;
        }
        .type-card i { font-size: 1.75rem; color: var(--primary); display: block; margin-bottom: .75rem; }
        .type-card h4 { font-size: .95rem; font-weight: 700; color: var(--heading); margin-bottom: .3rem; }
        .type-card p { font-size: .8rem; color: #9ca3af; margin: 0; line-height: 1.4; }

        /* FOOTER */
        footer {
            background: #1e1b4b;
            color: rgba(255,255,255,.8);
            padding: 2.5rem 1.5rem;
        }
        .footer-inner { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; }
        .footer-brand { font-weight: 700; color: #fff; font-size: 1rem; display: flex; align-items: center; gap: .5rem; }
        footer small { font-size: .82rem; }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .hero-inner { grid-template-columns: 1fr; }
            .hero-card { margin: 0 auto; }
            .feat-grid { grid-template-columns: 1fr; }
            .nav-links { display: none; }
        }
        @media (max-width: 600px) {
            .hero { padding: 5rem 1rem 4rem; }
            .btn-group-hero { flex-direction: column; align-items: flex-start; }
            .types-grid { grid-template-columns: repeat(2,1fr); }
        }
    </style>
</head>
<body>

<!-- NAV -->
<nav class="site-nav">
    <div class="nav-inner">
        <a href="{{ url('/') }}" class="brand">
            <div class="brand-icon">ข</div>
            เขียนดี
        </a>
        <ul class="nav-links">
            <li><a href="#start">เริ่มต้น</a></li>
            <li><a href="#features">ความสามารถ</a></li>
            <li><a href="#types">แนวบทความ</a></li>
        </ul>
        <a href="{{ url('/workspace') }}" class="btn-primary-custom">
            เริ่มเขียนบทความ <i class="ri-arrow-right-line"></i>
        </a>
    </div>
</nav>

<!-- HERO -->
<section id="start" class="hero">
    <div class="hero-inner">
        <div>
            <div class="ai-badge"><i class="ri-sparkling-2-line"></i> AI writing studio</div>
            <h1 class="hero-title">
                คิดบทความไม่ออก<br>
                <em>ให้ AI ช่วยคุณเริ่มต้น</em>
            </h1>
            <p class="hero-sub">เลือกแนวบทความ ใส่ไอเดียสั้น ๆ แล้วเปลี่ยนความคิดให้กลายเป็นบทความที่มีเสียงของคุณเอง</p>
            <div class="btn-group-hero">
                <a href="{{ url('/workspace') }}" class="btn-primary-lg">
                    เริ่มเขียนบทความ <i class="ri-arrow-right-line"></i>
                </a>
                <a href="#features" class="btn-outline-custom">ดูวิธีทำงาน <i class="ri-arrow-down-line"></i></a>
            </div>
            <p class="no-signup"><i class="ri-shield-check-line" style="color:var(--primary)"></i> ไม่ต้องสมัครสมาชิก เริ่มเขียนได้ทันที</p>
        </div>
        <div class="hero-card-wrap">
            <div class="hero-card">
                <div class="hero-card-header">
                    <span>ร่างบทความ / วันนี้บันทึกอัตโนมัติ</span>
                    <span class="badge-auto"><i class="ri-checkbox-circle-line"></i> บันทึกอัตโนมัติ</span>
                </div>
                <div class="hero-card-body">
                    <div class="article-type">บทความเรื่องการเติบโต</div>
                    <div class="article-title">
                        ทุกการเริ่มต้น<br>
                        <span>ไม่จำเป็นต้องสมบูรณ์แบบ</span>
                    </div>
                    <div class="placeholder-lines">
                        <div class="ph-line w-full"></div>
                        <div class="ph-line w-4"></div>
                        <div class="ph-line w-3"></div>
                    </div>
                    <div class="ai-tip">
                        <i class="ri-sparkling-2-line"></i>
                        บางครั้ง สิ่งที่เราต้องการไม่ใช่คำตอบ แต่คือจุดเริ่มต้น
                    </div>
                </div>
            </div>
            <div class="floating-badge">
                <i class="ri-lightbulb-flash-line" style="color:#fbbf24"></i>
                ไอเดียใหม่พร้อมต่อยอด
            </div>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section id="features" class="section section-bg">
    <div class="section-inner">
        <div class="text-center" style="margin-bottom:.5rem">
            <div class="section-label">เริ่มจากสิ่งที่คุณสนใจ</div>
            <h2 class="section-title">ทุกแนวคิดมีบทความที่รอการเล่า</h2>
            <p class="section-sub mx-auto">ให้ AI ช่วยลดความกังวลเรื่องการเริ่มต้น แล้วคุณเติมความหมายในแบบของคุณ</p>
        </div>
        <div class="feat-grid">
            <div class="feat-card blue">
                <div class="feat-icon purple"><i class="ri-lightbulb-line"></i></div>
                <h3>เริ่มจากไอเดียเดียว</h3>
                <p>ไม่ต้องมีโครงร่างที่สมบูรณ์ เพียงบอกสิ่งที่อยู่ในใจ</p>
            </div>
            <div class="feat-card cyan">
                <div class="feat-icon sky"><i class="ri-magic-line"></i></div>
                <h3>AI ช่วยต่อยอด</h3>
                <p>คิดชื่อเรื่อง สร้างโครงร่าง และช่วยร่างเนื้อหาให้เป็นขั้นตอน</p>
            </div>
            <div class="feat-card green">
                <div class="feat-icon emerald"><i class="ri-edit-2-line"></i></div>
                <h3>เสียงยังเป็นของคุณ</h3>
                <p>แก้ไข เติมประสบการณ์ และทำให้บทความเป็นตัวคุณ</p>
            </div>
        </div>
    </div>
</section>

<!-- TYPES -->
<section id="types" class="section">
    <div class="section-inner">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:1rem;margin-bottom:1rem">
            <div>
                <div class="section-label">แนวบทความ</div>
                <h2 class="section-title" style="margin-bottom:0">เลือกพื้นที่ให้ความคิด</h2>
            </div>
            <span style="color:#9ca3af;font-size:.9rem">เลือกแล้วเริ่มเขียนได้ทันที</span>
        </div>
        <div class="types-grid">
            @foreach ([
                ['การทำงาน','เปลี่ยนประสบการณ์ให้เป็นบทเรียน','ri-briefcase-line'],
                ['ความรัก','เล่าเรื่องความรู้สึกอย่างจริงใจ','ri-heart-3-line'],
                ['การต่อสู้ชีวิต','ส่งต่อพลังให้คนที่กำลังเดินต่อ','ri-sun-line'],
                ['การดำรงชีวิต','จัดระเบียบวันธรรมดาให้มีความหมาย','ri-home-heart-line'],
                ['นิยาย','สร้างโลกใหม่จากจินตนาการ','ri-book-open-line'],
                ['หนังสือพิมพ์','เล่าข่าวอย่างชัดเจนและเป็นกลาง','ri-newspaper-line'],
                ['การศึกษา','อธิบายเรื่องยากให้เข้าใจง่าย','ri-graduation-cap-line'],
                ['เทคโนโลยี','สำรวจสิ่งใหม่ที่กำลังเปลี่ยนโลก','ri-cpu-line'],
                ['สุขภาพ','แบ่งปันความรู้เพื่อชีวิตที่ดีขึ้น','ri-heart-pulse-line'],
                ['ธุรกิจ','เปลี่ยนไอเดียให้เป็นโอกาส','ri-line-chart-line'],
            ] as $type)
            <a href="{{ url('/workspace') }}?type={{ urlencode($type[0]) }}" class="type-card">
                <i class="{{ $type[2] }}"></i>
                <h4>{{ $type[0] }}</h4>
                <p>{{ $type[1] }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-inner">
        <div class="footer-brand"><i class="ri-quill-pen-line"></i> เขียนดี</div>
        <small style="color:rgba(255,255,255,.5)">AI ช่วยเริ่มต้น คุณช่วยเติมความหมาย</small>
        <small style="color:rgba(255,255,255,.45);text-align:right">
            Made by <strong style="color:rgba(255,255,255,.75)">Natthapat Srisonkram</strong><br>
            Mubakru Technological Computer Business · <a href="tel:0640164043" style="color:rgba(255,255,255,.55);text-decoration:none;">064-016-4043</a>
        </small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>