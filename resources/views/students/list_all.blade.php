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
                <h2 class="pageheader-title"><i class="fa fa-fw fa-user-graduate"></i> Student </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            New user created
        </div>
    @endif
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Student Information</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('new_student') }}" class="btn btn-sm" style="background-color:rgb(22, 129, 124) !important;
                            color: rgb(243, 245, 238) !important;"><i class="fa fa-fw fa-user-plus"></i> Add Student</a><br><br>
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset( $allStudents) && count($allStudents) > 0)
                                    @foreach ($allStudents as $student)
                                        <tr>
                                            <td>{{ $student['ref_number'] }}</td>
                                            <td>{{ $student['first_name'] . " " . $student['last_name'] }}</td>
                                            <td>{{ '' }}</td>
                                            <td>{{ $student['ref_number'] }}</td>
                                            <td>{{ $student->user->email_addr }}</td>
                                            <td>
                                                @if ($student['status'] === 0)
                                                    <span class="badge bg-danger text-white">disabled</span>                                                    
                                                @else
                                                    <span class="badge bg-success text-white">active</span>                                                    
                                                @endif
                                            </td>
                                            <td class="align-right">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="fa fa-edit"></i>
                                                </a> |
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>                                    
                                    @endforeach                           
                                @else
                                        <div class="alert alert-light">
                                            No Students found
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