@extends('layouts.base')

@section('title', 'add new course')


@section('main')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><i class="fa fa-fw fa-file-word"></i>Add new course </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('courses') }}" class="breadcrumb-link">all courses</a></li>
                                <li class="breadcrumb-item active" aria-current="page"Add>new course</li>
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
                <div class="card influencer-profile-data">
                    <div class="card-body">
                        <form method="POST" action="{{ route('new_course') }}" id="validationform">
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"><i class="fa fa-file-word"></i>Add new course</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Course Name <span class="text-danger">*</span> </label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Number of credits <span class="text-danger">*</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" name="credits" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">School year <span class="text-danger">*</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" name="year" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Department <span class="text-danger">*</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="department_id" id="" class="form-control">
                                        <option disabled selected>Select the department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @csrf
                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                </div>
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection