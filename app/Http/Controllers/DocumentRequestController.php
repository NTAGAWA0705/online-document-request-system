<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentRequestController extends Controller
{

    public function renderAllRequests()
    {
        return view('requests.request_doc');
    }

    public function newTranscriptForm()
    {
        return view('requests.request_transcript');
    }
}
