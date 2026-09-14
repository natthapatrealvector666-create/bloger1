<?php

namespace App\Http\Controllers;

use App\Models\ArticleType;
use Illuminate\Http\JsonResponse;

class ArticleTypeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => ArticleType::query()->where('is_active', true)->orderBy('name')->get(),
        ]);
    }
}
