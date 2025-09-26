<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function downloadGuidebook()
    {
        return response()->download(public_path('uploads/downloads/International Scientific Poster_ICICS_2023.pdf'));
    }
    
    public function downloadAbstract()
    {
        return response()->download(public_path('uploads/downloads/JICEST Abstract.docx'));
    }
    
    public function downloadPaper()
    {
        return response()->download(public_path('uploads/downloads/JICEST_Paper.docx'));
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
