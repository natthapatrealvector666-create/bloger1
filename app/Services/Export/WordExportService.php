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
        
        // Setup default font styles
        $phpWord->setDefaultFontName('Sarabun');
        $phpWord->setDefaultFontSize(14);
        
        $section = $phpWord->addSection();
        
        $title = $article->title ?: 'บทความไม่มีชื่อ';
        
        // Add Title
        $section->addText($title, ['name' => 'Sarabun', 'size' => 20, 'bold' => true], ['alignment' => 'center']);
        $section->addTextBreak(1);
        
        // Content
        $contentHtml = $article->content ?: '<p>ไม่มีเนื้อหา</p>';
        
        try {
            Html::addHtml($section, '<div>' . $contentHtml . '</div>', false, false);
        } catch (\Exception $e) {
            $section->addText(strip_tags($contentHtml));
        }
        
        $cleanTitle = trim(preg_replace('/[\\\\\/:\*\?"<>\|]/', '', $article->title ?? ''));
        $fileName = ($cleanTitle ?: 'article-' . $article->id) . '.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'phpword');
        
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);
        
        return response()->download($tempFile, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ])->deleteFileAfterSend(true);
    }
}
