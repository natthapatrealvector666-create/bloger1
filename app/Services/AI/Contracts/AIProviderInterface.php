<?php

namespace App\Services\AI\Contracts;

interface AIProviderInterface
{
    /**
     * Generate content based on a prompt.
     *
     * @param string $prompt
     * @return string|null
     */
    public function generate(string $prompt): ?string;
}
