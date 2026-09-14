<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview บทความ | Bloger</title>
    @if(!isset($isPdf))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            body { font-family: 'Sarabun', sans-serif; font-size: 16px; line-height: 1.6; }
            h1 { font-size: 24px; text-align: center; }
            .preview-meta { text-align: center; color: #666; font-size: 14px; margin-bottom: 20px; }
            .preview-content { margin-top: 20px; }
        </style>
    @endif
</head>
<body class="workspace-page preview-page" style="background: #f8f9fa;">
    @if(!isset($isPdf))
    <header class="workspace-header shell d-flex justify-content-between align-items-center p-3 bg-white border-bottom shadow-sm">
        <a class="text-decoration-none fw-bold text-dark" href="{{ url('/workspace') }}">← กลับหน้าเขียนบทความ</a>
        <div>
            <a href="{{ route('articles.export.pdf', $article->id) }}" class="btn btn-outline-danger me-2">ดาวน์โหลด PDF</a>
            <a href="{{ route('articles.export.word', $article->id) }}" class="btn btn-outline-primary">ดาวน์โหลด Word</a>
        </div>
    </header>
    @endif
    
    <main class="container my-5">
        <article class="bg-white p-5 rounded shadow-sm mx-auto" style="max-width: 800px; min-height: 1000px;">
            <div class="preview-meta text-center text-muted mb-4">
                <span>{{ $article->updated_at->format('d/m/Y') }}</span> • 
                <span>หมวด: {{ $article->articleType->name ?? 'ทั่วไป' }}</span>
            </div>
            
            <h1 class="text-center fw-bold mb-4">{{ $article->title ?: 'บทความไม่มีชื่อ' }}</h1>
            
            <div class="preview-content">
                {!! $article->content ?: '<p class="text-center text-muted">ไม่มีเนื้อหา</p>' !!}
            </div>
        </article>
    </main>
</body>
</html>
