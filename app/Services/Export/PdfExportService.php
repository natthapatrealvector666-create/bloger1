<?php

namespace App\Services\Export;

use App\Models\Article;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfExportService
{
    public function export(Article $article)
    {
        // Ensure storage/fonts directory exists for Dompdf font metric cache
        $fontDir = storage_path('fonts');
        if (!file_exists($fontDir)) {
            @mkdir($fontDir, 0755, true);
        }

        $regularPath = public_path('fonts/Sarabun-Regular.ttf');
        $boldPath = public_path('fonts/Sarabun-Bold.ttf');

        $fontRegular = file_exists($regularPath) ? base64_encode(file_get_contents($regularPath)) : '';
        $fontBold = file_exists($boldPath) ? base64_encode(file_get_contents($boldPath)) : '';

        $pdf = Pdf::loadView('pdf', [
            'article' => $article,
            'fontRegular' => $fontRegular,
            'fontBold' => $fontBold,
        ])
        ->setOption('isRemoteEnabled', true)
        ->setOption('isHtml5ParserEnabled', true)
        ->setOption('isFontSubsettingEnabled', true)
        ->setPaper('a4', 'portrait');

        $cleanTitle = trim(preg_replace('/[\\\\\/:\*\?"<>\|]/', '', $article->title ?? ''));
        $fileName = ($cleanTitle ?: 'article-' . $article->id) . '.pdf';

        return $pdf->download($fileName);
    }
}
