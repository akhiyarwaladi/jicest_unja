<?php

namespace App\Http\Controllers;

class DownloadController extends Controller
{
    private const ABSTRACT_TEMPLATE = 'uploads/JICEST_2026_Abstract_Template.docx';

    private const PAPER_TEMPLATE = 'uploads/JICEST_2026_Full_Paper_Template.docx';

    public function downloadGuidebook()
    {
        return response()->download(public_path('uploads/downloads/International Scientific Poster_ICICS_2023.pdf'));
    }

    public function downloadAbstract()
    {
        return response()->download(public_path(self::ABSTRACT_TEMPLATE), 'JICEST_2026_Abstract_Template.docx');
    }

    public function downloadPaper()
    {
        return response()->download(public_path(self::PAPER_TEMPLATE), 'JICEST_2026_Full_Paper_Template.docx');
    }

    public function downloadSchedule()
    {
        return response()->download(public_path('uploads/downloads/Schedule_JICEST.pdf'));
    }

    public function downloadGuidelines()
    {
        return response()->download(public_path('uploads/downloads/Presentation_Guidelines.pdf'));
    }
}
