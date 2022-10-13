<?php

namespace App\Http\Controllers;

use App\Models\Docsinrequest;
use App\Models\Documentrequest;
use App\Models\ProofOfPayment;
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

    public function createNewTranscript(Request $request)
    {
        $formData = $request->validate([
            'transcripts' => 'required',
            'proof' => 'required',
            'std_name' => 'required',
            'amount' => 'required',
            'payer_name' => 'required',
        ]);

        // dd(bcrypt($request->password));

        $requests = Documentrequest::create([
            'status' => 0,
            'student_id' => auth()->user()->student->id,
        ]);

        if (is_array($request->transcripts)) {
            foreach ($request->transcripts as $transcript) {
                Docsinrequest::create([
                    'documentrequest_id' => $requests->id,
                    'doctype_id' => 1,
                ]);
            }
        }

        $file_url = '';

        $requests = ProofOfPayment::create([
            'student_id' => auth()->user()->student->id,
            'documentrequest_id' => $requests->id,
            'payment_slip_id' => $request->slip_id,
            'payment_datetime' => $request->payment_datetime,
            'amount' => $request->amount,
            'method_of_payment' => 'bank',
            'bank_name' => $request->bank_name,
            'student_name' => $request->std_name,
            'slip_url' => $file_url,
            'status' => 0,
        ]);


        return redirect('/students')->with('success', 'the new student registered successfully');
    }
}
