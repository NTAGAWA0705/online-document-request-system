@extends('layouts.base')

@section('main')
@section('title', 'users - ODRS')


@section('main')
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"><i class="fa fa-fw fa-user-graduate"></i> Update your profile </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card influencer-profile-data">
                <div class="card-body">
                    <form method="POST" action="{{ route('settings') }}" id="validationform">
                        @php
                            $user_type = $user_info->user_type;
                        @endphp
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">First name</label>
                                <div class="col-12 col-sm-8 col-lg-6">

                                    <input type="fname" required="" value="{{ ($user_info->$user_type) ? $user_info->$user_type->first_name : '' }}" placeholder="Fist Name" name="fname" class="form-control">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Last Name</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="lname" placeholder="Last Name" value="{{ ($user_info->$user_type) ? $user_info->$user_type->last_name : '' }}" name="lname"  class="form-control">
                                </div>
                            </div>  
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email address</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="email" required="" value="{{ $user_info->email_addr }}" placeholder="Email Address" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="user_type" value="staff" id="">
                        @csrf
                        <div class="form-group row text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                <button type="submit" class="btn btn-space btn-primary"><i class="fas fa-edit"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection