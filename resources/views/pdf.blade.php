<!DOCTYPE html>
<html lang="th">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $article->title ?: 'บทความ' }}</title>
    <style>
        @if(!empty($fontRegular))
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 400;
            src: url("data:font/truetype;charset=utf-8;base64,{{ $fontRegular }}") format('truetype');
        }
        @else
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 400;
            src: url('https://github.com/google/fonts/raw/main/ofl/sarabun/Sarabun-Regular.ttf') format('truetype');
        }
        @endif

        @if(!empty($fontBold))
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 700;
            src: url("data:font/truetype;charset=utf-8;base64,{{ $fontBold }}") format('truetype');
        }
        @else
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 700;
            src: url('https://github.com/google/fonts/raw/main/ofl/sarabun/Sarabun-Bold.ttf') format('truetype');
        }
        @endif

        * {
            font-family: 'Sarabun', sans-serif !important;
            box-sizing: border-box;
        }
        body {
            font-family: 'Sarabun', sans-serif !important;
            font-size: 14pt;
            line-height: 1.6;
            color: #111111;
            margin: 0;
            padding: 0;
        }
        .header-meta {
            text-align: center;
            color: #666666;
            font-size: 11pt;
            margin-bottom: 20px;
            border-bottom: 1px solid #dddddd;
            padding-bottom: 15px;
        }
        .article-title {
            font-size: 20pt;
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
            color: #000000;
            line-height: 1.3;
        }
        .content {
            font-size: 14pt;
            line-height: 1.8;
            color: #222222;
        }
        .content h1, .content h2, .content h3, .content h4 {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #111111;
        }
        .content p {
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <div class="header-meta">
        <span>เขียนดี (KheanDee)</span> | 
        <span>หมวดหมู่: {{ $article->articleType->name ?? 'ทั่วไป' }}</span> | 
        <span>วันที่: {{ $article->updated_at->format('d/m/Y') }}</span>
    </div>

    <div class="article-title">
        {{ $article->title ?: 'บทความไม่มีชื่อ' }}
    </div>

    <div class="content">
        {!! $article->content ?: '<p>ไม่มีเนื้อหา</p>' !!}
    </div>
</body>
</html>
