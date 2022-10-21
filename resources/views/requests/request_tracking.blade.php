@extends('layouts.base')

@section('main')

@php
        $req_status = $status->status;
@endphp
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"><i class="fa fa-fw fa-user-graduate"></i> Document request status </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Document request status</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-timeline px-2 border-none"> 
        <ul class="bs4-order-tracking"> 
            <li class="step @if($req_status >= 0) active @endif "> 
                <div><i class="fas fa-user"></i></div> 
                Pending 
            </li> 
            <li class="step @if($req_status >= 1) active @endif"> 
                <div><i class="fas fa-bread-slice"></i></div> 
                Finance </li> 
            <li class="step  @if($req_status >= 2) active @endif"> 
                <div><i class="fas fa-truck"></i></div> 
                VRAC </li> 
            <li class="step @if($req_status >= 2) active @endif"> 
                <div><i class="fas fa-birthday-cake"></i></div> 
                Document Ready
            </li> 
        </ul> 
        <h5 class="text-center">
            @php $status_ = []; @endphp
            @switch($req_status)
                @case(0)
                    <span class="badge badge-light">Pending </span>Your document has been sent to the finance office waiting for approval.
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
                    <span class="badge badge-danger">Rejected by VRAC</span>
                @break
            @default                
        @endswitch
        </h5>

        <div class="details my-3">
            <h3>Document approvals</h3>
            <ul>
            @foreach ($approvalHistory as $history)
                <li><b>On {{ $history->created_at->format('d/m/Y H:i') }}</b>, 
                    @php
                        if($history->approval_level == 0)
                            $status_[0] = "document has been sent to the finance office waiting for approval.";
                        elseif ($history->approval_level == 1)
                            $status_[1] = "document Approved by finance, sent to VRAC.";
                        elseif ($history->approval_level == 2)
                            $status_[2] = "Approved, Document ready";
                        elseif ($history->approval_level == -1)
                            $status_[-1] = "Rejected your payment in the Finance office";
                        elseif ($history->approval_level == -2)
                            $status_[-2] = "Rejected by the VRAC";
                    @endphp
                    {{ $status_[$history->approval_level] }} </li>
            @endforeach
        </ul>
        </div>
    </div>
</div>
@endsection

@section('head')
    <style>
        .bs4-order-tracking{margin-bottom: 30px;overflow: hidden;color: #878788;padding-left: 0px;margin-top: 30px}.bs4-order-tracking li{list-style-type: none;font-size: 13px;width: 25%;float: left;position: relative;font-weight: 400;color: #878788;text-align: center}.bs4-order-tracking li:first-child:before{margin-left: 15px !important;padding-left: 11px !important;text-align : left !important}.bs4-order-tracking li:last-child:before{margin-right: 5px !important;padding-right: 11px !important;text-align : right !important}.bs4-order-tracking li>div{color: #fff;width: 29px;text-align: center;line-height: 29px;display: block;font-size: 12px;background: #878788;border-radius: 50%;margin: auto}.bs4-order-tracking li:after{content: '';width: 150%;height: 2px;background: #878788;position: absolute;left: 0%;right: 0%;top: 15px;z-index: -1}.bs4-order-tracking li:first-child:after{left: 50%}.bs4-order-tracking li:last-child:after{left: 0%!important;width: 0% !important}.bs4-order-tracking li.active{font-weight: bold;color: #dc3545}.bs4-order-tracking li.active>div{background: #dc3545}.bs4-order-tracking li.active:after{background: #dc3545}.card-timeline{background-color: #fff;z-index: 0}
    </style>
@endsection