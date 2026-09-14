<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AI\Contracts\AIProviderInterface;
use App\Services\AI\Providers\GeminiProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AIProviderInterface::class, GeminiProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
