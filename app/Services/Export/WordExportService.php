<?php

namespace App\Services\Export;

use App\Models\Article;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;

class WordExportService
{
    public function export(Article $article)
    {
        $phpWord = new PhpWord();
        
        // Setup font styles for Thai
        $phpWord->setDefaultFontName('Sarabun');
        $phpWord->setDefaultFontSize(16);
        
        $section = $phpWord->addSection();
        
        // Title
        $section->addText($article->title, ['name' => 'Sarabun', 'size' => 20, 'bold' => true], ['alignment' => 'center']);
        $section->addTextBreak(2);
        
        // Content (converting simple HTML to Word, replacing <br> and <p>)
        $html = "<h1>" . htmlspecialchars($article->title) . "</h1><br/>" . $article->content;
        
        Html::addHtml($section, $html, false, false);
        
        $fileName = $article->slug . '.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'phpword');
        
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);
        
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
