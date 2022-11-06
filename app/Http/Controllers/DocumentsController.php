<?php

namespace App\Http\Controllers;

use App\Models\Generateddoc;
use App\Models\Student;
use App\Models\StudentCourse;
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
        if (!$docObj) {
            return back()->with('message', 'No transcript found!');
        }
        $student_id = $docObj->student_id;
        $student = Student::all()->where('id', '=', $student_id)->first();
        $request_id = $docObj->docsinrequest_id;
        $year = $docObj->docsinrequest->docRequest;

        $courses = StudentCourse::all()->where('student_id', '=', $student_id);

        return view('docs.transcript', [
            'courses' => $courses,
            'year' => $year,
            'doc_id' => $doc_id,
            'student' => $student,
        ]);



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
