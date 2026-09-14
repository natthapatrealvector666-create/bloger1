<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title ?: 'บทความ' }} | เขียนดี</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #faf9f8;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }
        .public-article-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 4rem 2rem;
            background: transparent;
        }
        .article-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-align: center;
        }
        .article-meta {
            text-align: center;
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 3rem;
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 2rem;
        }
        .article-meta span {
            margin: 0 0.5rem;
        }
        .article-badge {
            background: #e9ecef;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .article-content {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #333;
        }
        .article-content p {
            margin-bottom: 1.5rem;
        }
        .brand-header {
            text-align: center;
            padding: 2rem 0;
            background: white;
            border-bottom: 1px solid #eaeaea;
        }
        .brand-header a {
            font-size: 1.5rem;
            font-weight: 700;
            color: #000;
            text-decoration: none;
            letter-spacing: -0.5px;
        }
        .article-footer {
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid #eaeaea;
            text-align: center;
        }
        .btn-write {
            display: inline-block;
            background: #000;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn-write:hover {
            background: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <header class="brand-header">
        <a href="{{ url('/') }}">
            <span style="display:inline-block;background:#000;color:#fff;width:32px;height:32px;line-height:32px;border-radius:8px;margin-right:8px;">ข</span>เขียนดี
        </a>
    </header>

    <main class="public-article-container">
        <h1 class="article-title">{{ $article->title ?: 'บทความไม่มีชื่อ' }}</h1>
        
        <div class="article-meta">
            @if($article->articleType)
                <span class="article-badge">{{ $article->articleType->name }}</span>
            @endif
            <span>เขียนเมื่อ {{ $article->updated_at->format('d M Y') }}</span>
            <div style="margin-top: 1rem; display: flex; gap: 8px; justify-content: center;">
                <a href="{{ route('articles.export.pdf', ['article' => $article->id]) }}" class="btn-write" style="background: #ef4444; padding: 0.4rem 1rem; font-size: 0.88rem;">📄 ดาวน์โหลด PDF</a>
                <a href="{{ route('articles.export.word', ['article' => $article->id]) }}" class="btn-write" style="background: #2563eb; padding: 0.4rem 1rem; font-size: 0.88rem;">📝 ดาวน์โหลด Word</a>
            </div>
        </div>
        
        <article class="article-content">
            {!! $article->content ?: '<p class="text-center" style="color:#999;font-style:italic;">ยังไม่มีเนื้อหา</p>' !!}
        </article>

        <div class="article-footer">
            <p style="color:#666;margin-bottom:1rem;">อยากเขียนเรื่องราวของคุณเองบ้างไหม?</p>
            <a href="{{ url('/workspace') }}" class="btn-write">เริ่มเขียนบทความของคุณ</a>
        </div>
    </main>
</body>
</html>
