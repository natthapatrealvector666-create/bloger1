<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เขียนดี | ผู้ช่วยเขียนบทความด้วย AI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="landing-page">
    <header class="site-header shell">
        <a class="brand" href="{{ url('/') }}"><span class="brand-mark">ข</span> เขียนดี</a>
        <span class="header-note">พื้นที่ของความคิดที่ยังเขียนไม่จบ</span>
        <a class="text-link" href="{{ url('/workspace') }}">ไปที่ Workspace <span aria-hidden="true">↗</span></a>
    </header>
    <main>
        <section class="hero shell">
            <div class="hero-copy">
                <p class="eyebrow"><span class="eyebrow-dot"></span> AI writing studio สำหรับทุกความคิด</p>
                <h1>คิดบทความไม่ออก<br><em>ให้ AI ช่วยคุณเริ่มต้น</em></h1>
                <p class="hero-description">เลือกแนวบทความ ใส่ไอเดียสั้น ๆ แล้วเปลี่ยนความคิดให้กลายเป็นบทความที่มีเสียงของคุณเอง</p>
                <div class="hero-actions"><a class="button button-primary" href="{{ url('/workspace') }}">เริ่มเขียนบทความ <span aria-hidden="true">→</span></a><a class="button button-quiet" href="#how-it-works">ดูวิธีทำงาน <span aria-hidden="true">↓</span></a></div>
                <p class="hero-footnote"><span aria-hidden="true">✦</span> ไม่ต้องสมัครสมาชิก เริ่มเขียนได้ทันที</p>
            </div>
            <div class="hero-art" aria-label="ภาพจำลองพื้นที่เขียนบทความ"><div class="paper-shadow"></div><div class="editor-paper"><div class="paper-topline"><span>ร่างบทความ / วันนี้</span><span class="save-state"><i></i> บันทึกอัตโนมัติ</span></div><p class="paper-kicker">บทความเรื่องการเติบโต</p><h2>ทุกการเริ่มต้น<br><span>ไม่จำเป็นต้องสมบูรณ์แบบ</span></h2><div class="paper-line long"></div><div class="paper-line medium"></div><div class="paper-line short"></div><div class="paper-highlight"><span>✦</span><p>บางครั้ง สิ่งที่เราต้องการ<br>ไม่ใช่คำตอบ แต่คือจุดเริ่มต้น</p></div><div class="paper-footer"><span>เขียนดี AI</span><span>01</span></div></div><div class="floating-note"><span>✦</span><strong>ไอเดียใหม่</strong><small>พร้อมต่อยอดแล้ว</small></div></div>
        </section>
        <section class="types-section shell" id="how-it-works">
            <div class="section-heading"><div><p class="eyebrow">เริ่มจากสิ่งที่คุณสนใจ</p><h2>ทุกแนวคิดมีบทความ<br>ที่รอการเล่า</h2></div><p>ตั้งแต่เรื่องเล็ก ๆ ในชีวิตประจำวัน<br>ไปจนถึงเรื่องที่อยากบอกโลก</p></div>
            <div class="type-grid">@foreach ([['01','การทำงาน','เปลี่ยนประสบการณ์ให้เป็นบทเรียน'],['02','ความรัก','เล่าเรื่องความรู้สึกอย่างจริงใจ'],['03','การต่อสู้ชีวิต','ส่งต่อพลังให้คนที่กำลังเดินต่อ'],['04','นิยาย','สร้างโลกใหม่จากจินตนาการ']] as $type)<a class="type-card" href="{{ url('/workspace') }}?type={{ Str::slug($type[1]) }}"><span class="type-number">{{ $type[0] }}</span><h3>{{ $type[1] }}</h3><p>{{ $type[2] }}</p><span class="type-arrow" aria-hidden="true">↗</span></a>@endforeach</div>
        </section>
    </main>
    <footer class="site-footer shell"><span>เขียนดี — เขียนในแบบของคุณ</span><span>AI ช่วยเริ่มต้น คุณช่วยเติมความหมาย</span></footer>
</body>
</html>