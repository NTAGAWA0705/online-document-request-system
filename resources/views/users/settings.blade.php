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

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card influencer-profile-data">
                <div class="card-body">
                    <form method="POST" action="{{ route('settings') }}" id="validationform">
                        @if ($user_info->user_type === 'student')
                            <div>
                                <p><b>First Name</b>: {{ $user_info->student->first_name }}</p>
                                <p><b>Last Name</b>: {{ $user_info->student->last_name }}</p>
                                <p><b>Ref Number</b>: {{ $user_info->student->ref_number }}</p>
                            </div>  
                        @else
                        @php
                            
                        @endphp
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">First name</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="email" required="" value="{{  }}" placeholder="Fist Name" name="email" class="form-control">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Last Name</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="email" placeholder="Last Name" name="email" class="form-control">
                                </div>
                            </div>                      
                        @endif
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email address</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="email" required="" placeholder="Email Address" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="password" required="" name="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        @csrf
                        <div class="form-group row text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                <button type="submit" class="btn btn-space btn-primary"><i class="fas fa-spinner fa-spin"></i> Update</button>
                            </div>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection