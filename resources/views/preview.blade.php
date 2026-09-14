<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title ?: 'Preview บทความ' }} | เขียนดี</title>
    <!-- Bootstrap 5 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Remix Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&family=Noto+Serif+Thai:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #7a5af8;
            --primary-light: #efeaff;
        }
        body {
            font-family: 'Noto Sans Thai', 'Inter', sans-serif;
            background: #f8f9fc;
            color: #374151;
        }

        /* Header */
        .preview-header {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: .85rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            gap: 1rem;
        }
        .back-link {
            color: #374151;
            text-decoration: none;
            font-weight: 600;
            font-size: .9rem;
            display: flex;
            align-items: center;
            gap: .4rem;
            white-space: nowrap;
        }
        .back-link:hover { color: var(--primary); }
        .btn-export {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .45rem 1rem;
            border-radius: 8px;
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s;
        }
        .btn-pdf { background: #fef2f2; color: #dc2626; border: 1px solid #fca5a5; }
        .btn-pdf:hover { background: #dc2626; color: #fff; }
        .btn-word { background: #eff6ff; color: #2563eb; border: 1px solid #93c5fd; }
        .btn-word:hover { background: #2563eb; color: #fff; }

        /* Article */
        .article-wrap {
            max-width: 760px;
            margin: 2.5rem auto;
            padding: 0 1.25rem 4rem;
        }
        .article-card {
            background: #fff;
            border-radius: 20px;
            padding: 3rem 3.5rem;
            box-shadow: 0 4px 32px rgba(0,0,0,.06);
        }
        .article-kicker {
            display: inline-block;
            background: var(--primary-light);
            color: var(--primary);
            font-size: .8rem;
            font-weight: 700;
            padding: .3rem .9rem;
            border-radius: 50px;
            margin-bottom: 1.5rem;
            letter-spacing: .03em;
        }
        .article-title {
            font-family: 'Noto Serif Thai', serif;
            font-size: clamp(1.75rem, 4vw, 2.4rem);
            font-weight: 700;
            color: #1e1b4b;
            line-height: 1.25;
            margin-bottom: 1.75rem;
        }
        .article-divider {
            height: 3px;
            width: 48px;
            background: var(--primary);
            border-radius: 50px;
            margin-bottom: 2rem;
            opacity: .5;
        }
        .article-meta {
            color: #9ca3af;
            font-size: .85rem;
            margin-bottom: 2.5rem;
            display: flex;
            align-items: center;
            gap: .75rem;
            flex-wrap: wrap;
        }
        .article-meta i { color: var(--primary); }

        /* Content typography */
        .article-body {
            font-size: 1.1rem;
            line-height: 1.9;
            color: #374151;
        }
        .article-body h1,
        .article-body h2,
        .article-body h3 {
            font-family: 'Noto Serif Thai', serif;
            color: #1e1b4b;
            margin-top: 2.25rem;
            margin-bottom: .85rem;
            line-height: 1.35;
        }
        .article-body h1 { font-size: 1.75rem; }
        .article-body h2 { font-size: 1.4rem; }
        .article-body h3 { font-size: 1.15rem; }
        .article-body p { margin-bottom: 1.4rem; }
        .article-body ul, .article-body ol {
            padding-left: 1.5rem;
            margin-bottom: 1.4rem;
        }
        .article-body li { margin-bottom: .5rem; }
        .article-body blockquote {
            border-left: 4px solid var(--primary);
            padding: .75rem 1.25rem;
            margin: 1.5rem 0;
            background: var(--primary-light);
            border-radius: 0 8px 8px 0;
            color: #5b3fd1;
            font-style: italic;
        }
        .article-body strong { color: #1e1b4b; }
        .empty-state {
            text-align: center;
            padding: 3rem 0;
            color: #9ca3af;
        }
        .empty-state i { font-size: 3rem; margin-bottom: 1rem; display: block; }

        @media (max-width: 640px) {
            .article-card { padding: 1.75rem 1.5rem; }
        }
    </style>
</head>
<body>

@if(!isset($isPdf))
<header class="preview-header">
    <a class="back-link" href="{{ url('/workspace') }}">
        <i class="ri-arrow-left-line"></i> กลับหน้าเขียนบทความ
    </a>
    <div style="display:flex;gap:.5rem;flex-wrap:wrap;">
        <a href="{{ route('articles.export.pdf', ['article' => $article->id, 'session_id' => request()->query('session_id')]) }}"
           class="btn-export btn-pdf">
            <i class="ri-file-pdf-line"></i> ดาวน์โหลด PDF
        </a>
        <a href="{{ route('articles.export.word', ['article' => $article->id, 'session_id' => request()->query('session_id')]) }}"
           class="btn-export btn-word">
            <i class="ri-file-word-line"></i> ดาวน์โหลด Word
        </a>
    </div>
</header>
@endif

<main class="article-wrap">
    <div class="article-card">
        @if($article->articleType)
            <span class="article-kicker">{{ $article->articleType->name }}</span>
        @endif

        <h1 class="article-title">{{ $article->title ?: 'บทความไม่มีชื่อ' }}</h1>

        <div class="article-divider"></div>

        <div class="article-meta">
            <span><i class="ri-calendar-line"></i> {{ $article->updated_at->locale('th')->translatedFormat('d M Y') }}</span>
            @if($article->excerpt)
                <span style="color:#d1d5db">•</span>
                <span><i class="ri-align-left"></i> {{ $article->excerpt }}</span>
            @endif
        </div>

        <div class="article-body">
            @if($article->content)
                {!! $article->content !!}
            @else
                <div class="empty-state">
                    <i class="ri-file-text-line"></i>
                    <p>ยังไม่มีเนื้อหา</p>
                    <p style="font-size:.9rem">กลับไปเขียนบทความในหน้า Workspace ก่อนครับ</p>
                </div>
            @endif
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
