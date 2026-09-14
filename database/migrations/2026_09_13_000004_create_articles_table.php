<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table): void {
            $table->id();
            $table->string('session_id')->index();
            $table->foreignId('article_type_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title')->nullable();
            $table->string('slug')->nullable()->index();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('status')->default('draft')->index();
            $table->json('keywords')->nullable();
            $table->string('audience')->nullable();
            $table->string('tone')->nullable();
            $table->string('length')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
