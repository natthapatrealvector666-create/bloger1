<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/article-types', [ArticleTypeController::class, 'index']);
Route::apiResource('articles', ArticleController::class);

Route::prefix('ai')->group(function () {
    Route::post('/title', [AIController::class, 'generateTitle']);
    Route::post('/outline', [AIController::class, 'generateOutline']);
    Route::post('/generate', [AIController::class, 'generateArticle']);
    Route::post('/rewrite', [AIController::class, 'rewriteText']);
});