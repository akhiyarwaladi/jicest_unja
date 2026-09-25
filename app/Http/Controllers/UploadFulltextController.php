<?php

namespace App\Http\Controllers;

class UploadFulltextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function upload()
    {
        $this->authorize('presenter');

        return view('participant.fulltext', [
            'title' => 'Submit Full Paper',
        ]);
    }

    public function uploadedPaper()
    {
        $this->authorize('administrator');

        return view('administrator.uploaded-paper', [
            'title' => 'Full Paper Submissions',
        ]);
    }
}
