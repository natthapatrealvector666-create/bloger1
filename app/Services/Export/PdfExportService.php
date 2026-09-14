<?php

namespace App\Services\Export;

use App\Models\Article;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfExportService
{
    public function export(Article $article)
    {
        // View for generating PDF
        $pdf = Pdf::loadView('preview', ['article' => $article, 'isPdf' => true])
            ->setPaper('a4', 'portrait')
            ->setWarnings(false);

        return $pdf->download($article->slug . '.pdf');
    }
}
