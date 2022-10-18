@extends('layouts.base')

@section('main')
    <h3>Make a new request</h3>
    <h4>Choose the document to request</h4>
    <a href="/requests/transcripts/new" class="btn btn-primary"> <i class="fas fa-file"></i> New Request</a>
    <a href="/requests/transcripts/new" class="btn btn-primary"> <i class="fas fa-folder"></i> Payment</a>

    <div class="my-3">
        <div class="card">
            <h5 class="card-header">My requests</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date initiated</th>
                                <th scope="col">Documents</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @if (isset( $myRequests) && count($myRequests) > 0)
                                @foreach ($myRequests as $request)
                                    <tr>
                                        <td>{{ $i++ }}</td>
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
                                        <td class="align-right">
                                            @switch($request['status'])
                                                @case(0)
                                                    <span class="badge badge-light">Pending</span>
                                                @break
                                                @case(1)
                                                    <span class="badge badge-light">Approved by finance, sent to VLAC</span>
                                                @break
                                                @case(2)
                                                    <span class="badge badge-light">Approved, Document ready</span>
                                                @break
                                                @case(-1)
                                                    <span class="badge badge-danger">Rejected your payment</span>
                                                    @break
                                                @case(-2)
                                                <span class="badge badge-danger">Rejected by VLAC</span>
                                                @break
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td>
                                            <a href="/requests/tracker/{{ $request['id'] }}" class="btn btn-primary">Track your request</a>
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
@endsection