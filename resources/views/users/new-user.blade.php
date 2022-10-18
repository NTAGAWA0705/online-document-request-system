@extends('layouts.base')

@section('title', 'New User')


@section('main')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><i class="fa fa-fw fa-file-word"></i> New User </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('allUsers') }}" class="breadcrumb-link">all Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        @if (session('usr.success'))
            <div class="alert alert-success">{{ session('usr.success') }}</div>
        @endif
        @if (session('usr.fail'))
            <div class="alert alert-warn">{{ session('usr.fail') }}</div>
        @endif

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card influencer-profile-data">
                    <div class="card-body">
                        <form method="POST" action="{{ route('new_user') }}" id="validationform">
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"><i class="fa fa-file-word"></i> New User</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Fist Name <span class="text-danger">*</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" placeholder="First name" name="fname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Last Name</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" placeholder="Last name" name="lname" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Email address <span class="text-danger">*</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="email" required="" placeholder="Email Address" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Password <span class="text-danger">*</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="password" required="" name="password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">User role <span class="text-danger">*</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="user_type" class="form-control" id="user_type">
                                        <option disabled selected>Select</option>
                                        <option value="finance">Finance Officer</option>
                                        <option value="department">Department admin</option>
                                        <option value="vlac">Top academic officer / VLAC</option>
                                        <option value="admin">System Administrator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Department</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="dep_id" class="form-control" id="dept">
                                        <option disabled selected>N/A</option>
                                        @if (isset($departments))
                                            @foreach ($departments as $department)
                                                <option value="{{ $department['id'] }}">{{ $department['department_name'] }}</option>
                                            @endforeach
                                        @endif
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