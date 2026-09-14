<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

use App\Http\Controllers\ArticleController;

Route::get('/workspace', function () {
    return view('workspace');
});

// Web routes for preview and export
Route::get('/articles/{article}/preview', [ArticleController::class, 'preview'])->name('articles.preview');
Route::get('/articles/{article}/export/pdf', [ArticleController::class, 'exportPdf'])->name('articles.export.pdf');
Route::get('/articles/{article}/export/word', [ArticleController::class, 'exportWord'])->name('articles.export.word');

// Public route for reading articles
Route::get('/article/{slug}', [ArticleController::class, 'publicShow'])->name('articles.public');
