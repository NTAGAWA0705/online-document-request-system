@extends('layouts.base')

@section('title', 'All departments')


@section('main')
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"><i class="fa fa-fw fa-user-graduate"></i> all departments </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">all departments</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">All all departments</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('new_dept') }}" class="btn btn-sm" style="background-color:rgb(22, 129, 124) !important;
                            color: rgb(243, 245, 238) !important;"><i class="fa fa-fw fa-user-plus"></i> Add department</a><br><br>
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">department Name</th>
                                    <th scope="col">Faculty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset( $departments) && count($departments) > 0)
                                @php
                                    $i = 1;
                                @endphp
                                    @foreach ($departments as $department)
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td>{{ $department['department_name'] }}</td>
                                            <td>{{ ($department->faculty) ? $department->faculty->faculty_name : 'N/A' }}</td>
                                        </tr>                                    
                                    @endforeach                           
                                @else
                                        <div class="alert alert-light">
                                            No departments found
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