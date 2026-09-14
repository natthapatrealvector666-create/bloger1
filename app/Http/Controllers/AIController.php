<?php

namespace App\Http\Controllers;

use App\Services\AI\AIWriterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AIController extends Controller
{
    protected AIWriterService $aiWriter;

    public function __construct(AIWriterService $aiWriter)
    {
        $this->aiWriter = $aiWriter;
    }

    public function generateTitle(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'article_type' => 'required|string',
            'keywords' => 'nullable|array',
            'tone' => 'required|string',
            'topic' => 'required|string',
        ]);

        $keywords = $validated['keywords'] ?? [];

        $result = $this->aiWriter->generateTitle(
            $validated['article_type'],
            $keywords,
            $validated['tone'],
            $validated['topic']
        );

        return response()->json(['data' => $result]);
    }

    public function generateOutline(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'article_type' => 'required|string',
            'title' => 'required|string',
            'tone' => 'required|string',
        ]);

        $result = $this->aiWriter->generateOutline(
            $validated['article_type'],
            $validated['title'],
            $validated['tone']
        );

        return response()->json(['data' => $result]);
    }

    public function generateArticle(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'article_type' => 'required|string',
            'title' => 'required|string',
            'outline' => 'required|string',
            'tone' => 'required|string',
            'length' => 'required|string',
        ]);

        $result = $this->aiWriter->generateArticle(
            $validated['article_type'],
            $validated['title'],
            $validated['outline'],
            $validated['tone'],
            $validated['length']
        );

        return response()->json(['data' => $result]);
    }

    public function rewriteText(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'text' => 'required|string',
            'instruction' => 'required|string',
        ]);

        $result = $this->aiWriter->rewriteText(
            $validated['text'],
            $validated['instruction']
        );

        return response()->json(['data' => $result]);
    }
}
