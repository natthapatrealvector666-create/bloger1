<!doctype html>
<html lang="th" class="light-style layout-navbar-fixed layout-wide" dir="ltr" data-theme="theme-default" data-template="front-pages-no-customizer" data-style="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เขียนดี | ผู้ช่วยเขียนบทความด้วย AI</title>
    <link rel="stylesheet" href="{{ asset('materio-bootstrap-html-admin-template/assets/vendor/fonts/remixicon/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('materio-bootstrap-html-admin-template/assets/vendor/libs/node-waves/node-waves.css') }}">
    <link rel="stylesheet" href="{{ asset('materio-bootstrap-html-admin-template/assets/vendor/css/rtl/core.css') }}">
    <link rel="stylesheet" href="{{ asset('materio-bootstrap-html-admin-template/assets/vendor/css/rtl/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('materio-bootstrap-html-admin-template/assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('materio-bootstrap-html-admin-template/assets/vendor/css/pages/front-page.css') }}">
    <link rel="stylesheet" href="{{ asset('materio-bootstrap-html-admin-template/assets/vendor/css/pages/front-page-landing.css') }}">
    <style>
        :root { --bs-primary: #7a5af8; --bs-primary-rgb: 122, 90, 248; --bs-heading-color: #27314b; }
        body { background: #fbfbfe; }
        .landing-navbar { background: rgba(255,255,255,.9) !important; }
        .landing-hero { background: linear-gradient(180deg, #f3f0ff 0%, #fbfbfe 80%); padding-top: 8rem; }
        .hero-title { letter-spacing: -.04em; }
        .hero-title em { color: #7a5af8; font-family: Georgia, serif; font-weight: 500; }
        .hero-dashboard-img { border: 1px solid rgba(122,90,248,.15); box-shadow: 0 1.5rem 3rem rgba(51,42,100,.12); }
        .feature-card { height: 100%; transition: transform .2s ease, box-shadow .2s ease; }
        .feature-card:hover { transform: translateY(-5px); box-shadow: 0 .75rem 1.5rem rgba(46,38,61,.1); }
        .ai-badge { background: #efeaff; color: #6941e8; }
        .landing-footer { background: #27233a; }
        @media (max-width: 991.98px) { .landing-hero { padding-top: 6rem; } }
    </style>
</head>
<body>
    <nav class="layout-navbar container shadow-none py-0">
        <div class="navbar navbar-expand-lg landing-navbar border-top-0 px-4 px-md-8">
            <a href="{{ url('/') }}" class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-6">
                <span class="app-brand-logo demo"><span class="avatar avatar-sm"><span class="avatar-initial rounded bg-primary">ข</span></span></span>
                <span class="app-brand-text demo menu-text fw-semibold ms-2 ps-1">เขียนดี</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#landingNav" aria-label="เปิดเมนู"><i class="ri-menu-line ri-24px"></i></button>
            <div class="collapse navbar-collapse landing-nav-menu" id="landingNav">
                <ul class="navbar-nav me-auto p-4 p-lg-0">
                    <li class="nav-item"><a class="nav-link fw-medium" href="#start">เริ่มต้น</a></li>
                    <li class="nav-item"><a class="nav-link fw-medium" href="#features">ความสามารถ</a></li>
                    <li class="nav-item"><a class="nav-link fw-medium" href="#types">แนวบทความ</a></li>
                </ul>
                <a class="btn btn-primary rounded-pill px-4" href="{{ url('/workspace') }}">เริ่มเขียนบทความ <i class="ri-arrow-right-line ms-1"></i></a>
            </div>
        </div>
    </nav>

    <section id="start" class="section-py landing-hero position-relative overflow-hidden">
        <div class="container">
            <div class="row align-items-center gy-8">
                <div class="col-lg-6 text-center text-lg-start">
                    <span class="badge rounded-pill ai-badge px-3 py-2 mb-4"><i class="ri-sparkling-2-line me-1"></i> AI writing studio</span>
                    <h1 class="hero-title display-5 fw-bold mb-4">คิดบทความไม่ออก<br><em>ให้ AI ช่วยคุณเริ่มต้น</em></h1>
                    <p class="lead text-body-secondary mb-5">เลือกแนวบทความ ใส่ไอเดียสั้น ๆ แล้วเปลี่ยนความคิดให้กลายเป็นบทความที่มีเสียงของคุณเอง</p>
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                        <a class="btn btn-primary btn-lg rounded-pill px-5" href="{{ url('/workspace') }}">เริ่มเขียนบทความ <i class="ri-arrow-right-line ms-1"></i></a>
                        <a class="btn btn-label-secondary btn-lg rounded-pill px-4" href="#features">ดูวิธีทำงาน <i class="ri-arrow-down-line ms-1"></i></a>
                    </div>
                    <p class="small text-body-secondary mt-4 mb-0"><i class="ri-shield-check-line text-primary me-1"></i> ไม่ต้องสมัครสมาชิก เริ่มเขียนได้ทันที</p>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative mx-auto" style="max-width: 560px">
                        <div class="card hero-dashboard-img border-0 rounded-4 overflow-hidden">
                            <div class="card-header d-flex justify-content-between align-items-center bg-white py-3"><span class="fw-semibold">ร่างบทความ / วันนี้</span><span class="badge bg-label-success"><i class="ri-checkbox-circle-line me-1"></i>บันทึกอัตโนมัติ</span></div>
                            <div class="card-body bg-white p-5"><span class="text-primary small fw-medium">บทความเรื่องการเติบโต</span><h2 class="h3 fw-bold mt-3 mb-4">ทุกการเริ่มต้น<br><span class="text-primary">ไม่จำเป็นต้องสมบูรณ์แบบ</span></h2><div class="placeholder-glow mb-4"><span class="placeholder col-12"></span><span class="placeholder col-10"></span><span class="placeholder col-7"></span></div><div class="alert bg-label-primary border-0 mb-0"><i class="ri-sparkling-2-line me-2"></i> บางครั้ง สิ่งที่เราต้องการไม่ใช่คำตอบ แต่คือจุดเริ่มต้น</div></div>
                        </div>
                        <div class="badge bg-dark position-absolute bottom-0 end-0 translate-middle-y p-3 rounded-3 shadow"><i class="ri-lightbulb-flash-line text-warning me-1"></i> ไอเดียใหม่พร้อมต่อยอด</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="section-py bg-white">
        <div class="container"><div class="text-center mb-8"><span class="text-primary small fw-semibold text-uppercase">เริ่มจากสิ่งที่คุณสนใจ</span><h2 class="fw-bold mt-2">ทุกแนวคิดมีบทความที่รอการเล่า</h2><p class="text-body-secondary">ให้ AI ช่วยลดความกังวลเรื่องการเริ่มต้น แล้วคุณเติมความหมายในแบบของคุณ</p></div>
            <div class="row g-4"><div class="col-md-4"><div class="card feature-card border-0 bg-label-primary rounded-4"><div class="card-body p-5"><div class="avatar avatar-lg mb-4"><span class="avatar-initial rounded bg-primary"><i class="ri-lightbulb-line ri-24px"></i></span></div><h3 class="h5">เริ่มจากไอเดียเดียว</h3><p class="mb-0 text-body-secondary">ไม่ต้องมีโครงร่างที่สมบูรณ์ เพียงบอกสิ่งที่อยู่ในใจ</p></div></div></div><div class="col-md-4"><div class="card feature-card border-0 bg-label-info rounded-4"><div class="card-body p-5"><div class="avatar avatar-lg mb-4"><span class="avatar-initial rounded bg-info"><i class="ri-magic-line ri-24px"></i></span></div><h3 class="h5">AI ช่วยต่อยอด</h3><p class="mb-0 text-body-secondary">คิดชื่อเรื่อง สร้างโครงร่าง และช่วยร่างเนื้อหาให้เป็นขั้นตอน</p></div></div></div><div class="col-md-4"><div class="card feature-card border-0 bg-label-success rounded-4"><div class="card-body p-5"><div class="avatar avatar-lg mb-4"><span class="avatar-initial rounded bg-success"><i class="ri-edit-2-line ri-24px"></i></span></div><h3 class="h5">เสียงยังเป็นของคุณ</h3><p class="mb-0 text-body-secondary">แก้ไข เติมประสบการณ์ และทำให้บทความเป็นตัวคุณ</p></div></div></div></div>
        </div>
    </section>

    <section id="types" class="section-py"><div class="container"><div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-6"><div><span class="text-primary small fw-semibold">แนวบทความ</span><h2 class="fw-bold mt-2 mb-0">เลือกพื้นที่ให้ความคิด</h2></div><span class="text-body-secondary">เลือกแล้วเริ่มเขียนได้ทันที</span></div><div class="row g-3">@foreach ([['การทำงาน','เปลี่ยนประสบการณ์ให้เป็นบทเรียน','ri-briefcase-line'],['ความรัก','เล่าเรื่องความรู้สึกอย่างจริงใจ','ri-heart-3-line'],['การต่อสู้ชีวิต','ส่งต่อพลังให้คนที่กำลังเดินต่อ','ri-sun-line'],['การดำรงชีวิต','จัดระเบียบวันธรรมดาให้มีความหมาย','ri-home-heart-line'],['นิยาย','สร้างโลกใหม่จากจินตนาการ','ri-book-open-line'],['หนังสือพิมพ์','เล่าข่าวอย่างชัดเจนและเป็นกลาง','ri-newspaper-line'],['การศึกษา','อธิบายเรื่องยากให้เข้าใจง่าย','ri-graduation-cap-line'],['เทคโนโลยี','สำรวจสิ่งใหม่ที่กำลังเปลี่ยนโลก','ri-cpu-line'],['สุขภาพ','แบ่งปันความรู้เพื่อชีวิตที่ดีขึ้น','ri-heart-pulse-line'],['ธุรกิจ','เปลี่ยนไอเดียให้เป็นโอกาส','ri-line-chart-line']] as $type)<div class="col-6 col-md-4 col-lg-3"><a href="{{ url('/workspace') }}?type={{ Str::slug($type[0]) }}" class="card feature-card h-100 border rounded-4 text-decoration-none"><div class="card-body p-4"><i class="{{ $type[2] }} ri-28px text-primary"></i><h3 class="h6 mt-4 mb-2">{{ $type[0] }}</h3><p class="small text-body-secondary mb-0">{{ $type[1] }}</p></div></a></div>@endforeach</div></div></section>

    <footer class="landing-footer text-white py-5"><div class="container d-flex flex-wrap justify-content-between gap-3"><span class="fw-semibold"><i class="ri-quill-pen-line me-2"></i>เขียนดี</span><span class="small text-white-50">AI ช่วยเริ่มต้น คุณช่วยเติมความหมาย</span></div></footer>
    <script src="{{ asset('materio-bootstrap-html-admin-template/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('materio-bootstrap-html-admin-template/assets/vendor/js/bootstrap.js') }}"></script>
</body>
</html>