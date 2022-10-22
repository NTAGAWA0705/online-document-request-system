@extends('layouts.base')

@section('title', 'My Documents - ODRS')


@section('main')
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"><i class="fa fa-fw fa-user-graduate"></i> My Documents </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Documents</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">My Documents</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Document name</th>
                                    <th scope="col">Date generated</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset( $myDocs) || count($myDocs) > 0)
                                @php $i = 1; 
                                @endphp
                                    @foreach ($myDocs as $doc)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            @php
                                                $docsInreq = $doc->docsinrequest;
                                            @endphp
                                            <td>{{ ($docsInreq) ? $docsInreq->doctype->name : 'Transcript' }} | year {{ $doc->docsinrequest->college_year }}</td>
                                            <td>{{ $doc['created_at']->format('d/m/Y, H:i') }}</td>
                                            <td class="align-right">
                                                <a href="{{ route('download_transcript', $doc->id) }}" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
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