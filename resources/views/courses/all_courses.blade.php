@extends('layouts.base')

@section('title', 'All courses')


@section('main')
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"><i class="fa fa-fw fa-user-graduate"></i> all courses </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">all courses</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ seesion('success') }}
        </div>
    @endif
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">All all courses</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('new_course') }}" class="btn btn-sm" style="background-color:rgb(22, 129, 124) !important;
                            color: rgb(243, 245, 238) !important;"><i class="fa fa-fw fa-user-plus"></i> Add course</a><br><br>
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Credits</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset( $courses) && count($courses) > 0)
                                @php
                                    $i = 1;
                                @endphp
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td>{{ $course['course_name'] }}</td>
                                            <td>{{ $course->department->department_name }}</td>
                                            <td>{{ $course['year'] }}</td>
                                            <td>{{ $course['credits'] }}</td>
                                        </tr>                                    
                                    @endforeach                           
                                @else
                                        <div class="alert alert-light">
                                            No courses found
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