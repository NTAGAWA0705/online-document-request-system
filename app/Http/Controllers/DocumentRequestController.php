<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;
use App\Models\Docsinrequest;
use App\Models\ProofOfPayment;
use App\Models\Documentrequest;
use Illuminate\Validation\Rules\File;

class DocumentRequestController extends Controller
{

    public function renderAllRequests()
    {
        $userRequests = Documentrequest::all()->where('student_id', '=', auth()->user()->student->id);
        return view('requests.request_doc', [
            'myRequests' => $userRequests,
        ]);
    }

    public function newTranscriptForm()
    {
        return view('requests.request_transcript');
    }

    public function createNewTranscript(Request $request)
    {
        $formData = $request->validate([
            'transcripts' => 'required',
            'std_name' => 'required',
            'amount' => 'required',
            'proof' =>
            File::types(['jpg', 'png', 'pdf', 'doc', 'docx'])
                ->max(3 * 1024),

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
                    'college_year' => $transcript
                ]);
            }
        }
        if ($request->file('proof')) {
            $file = $request->file('proof');
            $fileName = time() . '_' . uniqid() . $file->getClientOriginalName();
            $filePath = $request->file('proof')->storeAs('uploads', $fileName, 'public');
        }

        $file_url = $filePath;

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


        return redirect('/requests')->with('success', 'your new transcripts has been ordered');
    }

    public function renderTracker($request_id)
    {
        $status = Documentrequest::find($request_id, 'status');
        return view('requests.request_tracking', [
            'status' => $status,
        ]);
    }

    public function viewStudentRequests()
    {
        $approval_level = 0;
        if (auth()->user()->userrole === "finance") {
            $approval_level = 1;
        } elseif (auth()->user()->userrole === "vlac") {
            $approval_level = 2;
        }

        $can_be_approved = Approval::all()->where('approval_level', '=', $approval_level)->where('request_id', '=', 5)->count();

        $userRequests = Documentrequest::all()->where('status', '<=', $approval_level);

        return view('requests.all_student_requests', [
            'studentsRequests' => $userRequests,
            'levelApproval' => $approval_level,
            'can_be_approved' => $can_be_approved,
        ]);
    }

    public function approveDocuments(Request $request)
    {
        $approvalLevel = $request->approvalLevel;
        $is_approved = $request->is_approved;
        $request_id = $request->request_id;

        dd($approvalLevel, $request_id);
    }
}
