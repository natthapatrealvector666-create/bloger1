<?php

namespace App\Services\AI;

use App\Services\AI\Contracts\AIProviderInterface;

class AIWriterService
{
    protected AIProviderInterface $provider;
    protected PromptBuilderService $promptBuilder;

    public function __construct(AIProviderInterface $provider, PromptBuilderService $promptBuilder)
    {
        $this->provider = $provider;
        $this->promptBuilder = $promptBuilder;
    }

    public function generateTitle(string $articleType, array $keywords, string $tone, string $topic): ?string
    {
        $prompt = $this->promptBuilder->buildTitlePrompt($articleType, $keywords, $tone, $topic);
        return $this->provider->generate($prompt);
    }

    public function generateOutline(string $articleType, string $title, string $tone): ?string
    {
        $prompt = $this->promptBuilder->buildOutlinePrompt($articleType, $title, $tone);
        return $this->provider->generate($prompt);
    }

    public function generateArticle(string $articleType, string $title, string $outline, string $tone, string $length): ?string
    {
        $prompt = $this->promptBuilder->buildArticlePrompt($articleType, $title, $outline, $tone, $length);
        return $this->provider->generate($prompt);
    }

    public function rewriteText(string $text, string $instruction): ?string
    {
        $prompt = $this->promptBuilder->buildRewritePrompt($text, $instruction);
        return $this->provider->generate($prompt);
    }
}
