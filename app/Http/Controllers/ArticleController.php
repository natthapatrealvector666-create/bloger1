<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $sessionId = $this->sessionId($request);

        return response()->json([
            'data' => Article::with('articleType')
                ->forSession($sessionId)
                ->latest('updated_at')
                ->get(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $article = Article::create($this->validatedData($request, $this->sessionId($request)));

        return response()->json(['data' => $article->load('articleType')], 201);
    }

    public function show(Request $request, Article $article): JsonResponse
    {
        abort_unless($article->session_id === $this->sessionId($request), 404);

        return response()->json(['data' => $article->load('articleType')]);
    }

    public function update(Request $request, Article $article): JsonResponse
    {
        abort_unless($article->session_id === $this->sessionId($request), 404);
        $article->update($this->validatedData($request, $article->session_id, true));

        return response()->json(['data' => $article->fresh('articleType')]);
    }

    public function destroy(Request $request, Article $article): JsonResponse
    {
        abort_unless($article->session_id === $this->sessionId($request), 404);
        $article->delete();

        return response()->json(status: 204);
    }

    private function validatedData(Request $request, string $sessionId, bool $partial = false): array
    {
        $rules = [
            'article_type_id' => ['nullable', 'integer', 'exists:article_types,id'],
            'title' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'status' => ['nullable', 'in:draft,published,archived'],
            'keywords' => ['nullable', 'array'],
            'keywords.*' => ['string', 'max:100'],
            'audience' => ['nullable', 'string', 'max:255'],
            'tone' => ['nullable', 'string', 'max:100'],
            'length' => ['nullable', 'string', 'max:50'],
        ];

        $data = $request->validate($rules);
        $data['session_id'] = $sessionId;
        if (array_key_exists('title', $data)) {
            $data['slug'] = Str::slug($data['title'] ?: 'draft-'.$sessionId.'-'.now()->timestamp);
        }

        return $data;
    }

    private function sessionId(Request $request): string
    {
        return (string) ($request->header('X-Session-Id') ?: $request->query('session_id') ?: $request->session()->getId());
    }

    public function preview(Request $request, Article $article)
    {
        abort_unless($article->session_id === $this->sessionId($request), 404);
        return view('preview', compact('article'));
    }

    public function exportPdf(Request $request, Article $article, \App\Services\Export\PdfExportService $pdfService)
    {
        abort_unless($article->session_id === $this->sessionId($request), 404);
        return $pdfService->export($article);
    }

    public function exportWord(Request $request, Article $article, \App\Services\Export\WordExportService $wordService)
    {
        abort_unless($article->session_id === $this->sessionId($request), 404);
        return $wordService->export($article);
    }
}
