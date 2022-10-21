<?php

namespace App\Http\Controllers;

use App\Models\Generateddoc;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function showUserDocuments()
    {
        $userDocs = Generateddoc::all()->where('student_id', '=', auth()->user()->id);

        return view('docs.my-documents', [
            'myDocs' => $userDocs,
        ]);
    }


    public function renderTranscript($doc_id)
    {
        $documentId = $doc_id;
        $docObj = Generateddoc::all()->where('id', '=', $documentId)->first();

        $student_id = $docObj->student_id;




        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y')
        // ];

        // $pdf = PDF::loadView('docs.transcript', $data);

        // return $pdf->download('itsolutionstuff.pdf');
    }

    public function generateTranscript()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
