<?php

namespace App\Http\Controllers;

use App\Models\Generateddoc;
use Illuminate\Http\Request;

use function Termwind\render;

class DocumentsController extends Controller
{
    public function showUserDocuments()
    {
        $userDocs = Generateddoc::all()->where('student_id', '=', auth()->user()->id);
        return view('docs.my-documents', [
            'myDocs' => $userDocs,
        ]);
    }
}
