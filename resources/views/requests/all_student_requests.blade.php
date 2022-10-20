@extends('layouts.base')

@section('title', 'Students - ODRS')


@section('main')
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"><i class="fa fa-fw fa-user-graduate"></i> Incoming requests </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Incoming requests</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">All incoming requests</h5>
                <div class="card-body">
                    <div class="table-responsive"><br><br>
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Date</th>
                                    @can('validate_payment_proof')
                                        <th scope="col">Proof of payment</th>
                                    @endcan
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                            @endphp
                            @if (isset( $studentsRequests) && count($studentsRequests) > 0)
                                @foreach ($studentsRequests as $request)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            @if ($request->student !== NULL)
                                                {{ $request->student->fist_name . " " . $request->student->last_name  }}
                                            @else
                                                {{"N/A"}}
                                            @endif
                                        </td>
                                        <td>{{ $request['created_at'] }}</td>
                                        <td>
                                            @if ($request->docsInRequest != null)
                                                @foreach ($request->docsInRequest as $doc)
                                                    <span class="badge badge-light">{{ 'transcript . year:' . $doc->college_year }}</span>
                                                @endforeach
                                            @else
                                                <span class="badge badge-warn">None</span>
                                            @endif
                                        </td>
                                        @can('validate_payment_proof')
                                            <td>
                                                @if ($request->proof !== NULL)
                                                    <a href="/storage/{{$request->proof->slip_url}}" class="btn btn-link p-0">Payment proof</a>
                                                @else
                                                    {{"N/A"}}
                                                @endif
                                            </td>
                                        @endcan
                                        <td class="align-right">
                                            @switch($request['status'])
                                                @case(0)
                                                    <span class="badge badge-warning">Pending</span>
                                                @break
                                                @case(1)
                                                    <span class="badge badge-warning">Approved by finance, sent to VRAC</span>
                                                @break
                                                @case(2)
                                                    <span class="badge badge-warning">Approved, Document ready</span>
                                                @break
                                                @case(-1)
                                                    <span class="badge badge-danger">Rejected your payment</span>
                                                    @break
                                                @case(-2)
                                                <span class="badge badge-danger">Rejected by VRAC</span>
                                                @break
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td>
                                            @if (isset($request->approval))
                                                <form action="/approve-student-request" class="d-inline m-0 p-0" method="post">
                                                    <input type="hidden" name="approvalLevel" value="{{ $levelApproval }}">
                                                    <input type="hidden" name="user_info" value="{{ $request->student->fist_name . " " . $request->student->last_name . ',' . $request->student->user->email_addr }}">
                                                    <input type="hidden" name="is_approved" value="1">
                                                    <input type="hidden" name="request_id" value="{{ $request['id'] }}">
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Approve</button>
                                                    @csrf
                                                </form>
                                                <form action="/approve-student-request" class="d-inline m-0 p-0" method="post">
                                                    <input type="hidden" name="approvalLevel" value="{{ $levelApproval }}">
                                                    <input type="hidden" name="is_approved" value="0">                                                
                                                    <input type="hidden" name="request_id" value="{{ $request['id'] }}">
                                                    <button type="submit" class="btn btn-light border"><i class="fas fa-times-circle"></i> Reject</button>
                                                    @csrf
                                                </form>
                                            @endif
                                            <a href="/requests/tracker/{{ $request['id'] }}" class="btn btn-light btn-sm">View status</a>
                                        </td>
                                    </tr>                                    
                                @endforeach                           
                            @else
                                    <div class="alert alert-light">
                                        No document found for you
                                    </div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end responsive table -->
        <!-- ============================================================== -->
    </div>

</div>

</div>
@endsection