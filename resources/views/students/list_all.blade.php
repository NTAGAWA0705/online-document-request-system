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
                                    <th scope="col">ID No.</th>
                                    <th scope="col">Complete Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Account</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>STDNT-101-21</td>
                                    <td>Garrett Winters</td>
                                    <td>Integration Specialist</td>
                                    <td>4th</td>
                                    <td>09349939439</td>
                                    <td>garret@gmail.com</td>
                                    <td><span class="badge bg-success text-white">active</span></td>
                                    <td class="align-right">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-edit"></i>
                                        </a> |
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>STDNT-102-21</td>
                                    <td>Ashton Cox</td>
                                    <td>System Architect</td>
                                    <td>2nd</td>
                                    <td>09349939439</td>
                                    <td>ashton@gmail.com</td>
                                    <td><span class="badge bg-danger text-white">inactive</span></td>
                                    <td class="align-right">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-edit"></i>
                                        </a> |
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>STDNT-103-21</td>
                                    <td>Charde Marshall</td>
                                    <td>Accountant</td>
                                    <td>4th</td>
                                    <td>09349939439</td>
                                    <td>charde@gmail.com</td>
                                    <td><span class="badge bg-success text-white">active</span></td>
                                    <td class="align-right">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-edit"></i>
                                        </a> |
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>STDNT-104-21</td>
                                    <td>Cedric Kelly</td>
                                    <td>Software Engineer</td>
                                    <td>4th</td>
                                    <td>09349939439</td>
                                    <td>cedric@gmail.com</td>
                                    <td><span class="badge bg-success text-white">active</span></td>
                                    <td class="align-right">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-edit"></i>
                                        </a> |
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>STDNT-105-21</td>
                                    <td>Quinn Flynn</td>
                                    <td>Integration Specialist</td>
                                    <td>3rd</td>
                                    <td>09349939439</td>
                                    <td>quinn@gmail.com</td>
                                    <td><span class="badge bg-danger text-white">inactive</span></td>
                                    <td class="align-right">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-edit"></i>
                                        </a> |
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
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