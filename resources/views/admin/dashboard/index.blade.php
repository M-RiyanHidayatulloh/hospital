@extends('admin.includes.home')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard {{ Auth::user()->name }}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard {{ Auth::user()->name }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-4 col-md-12">
                <div class="card">
                    <div class="card-body bg-success">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3>{{$doctor}}</h3>
                                <h6 class="text-muted m-b-0">Doctor<i class="fa fa-user-md text-c-secondary m-l-10"></i></h6>
                            </div>
                            <div class="col-6">
                                <!-- <div id="seo-chart1" class="d-flex align-items-end"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body bg-danger">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3>{{$patient}}</h3>
                                <h6 class="text-muted m-b-0">Patient<i class="fa fa-user text-c-secondary m-l-10"></i></h6>
                            </div>
                            <div class="col-6">
                                <!-- <div id="seo-chart2" class="d-flex align-items-end"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body bg-warning">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3>{{$room}}</h3>
                                <h6 class="text-muted m-b-0">Room<i class="fa fa-hospital text-c-secondary m-l-10"></i></h6>
                            </div>
                            <div class="col-6">
                                <!-- <div id="seo-chart3" class="d-flex align-items-end"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3">Queue</h5>
                            <!-- <p class="text-c-green f-w-500"><i class="fa fa-caret-up m-r-15"></i> 18% High than last month</p> -->
                            <div class="row">
                                <div class="col-4 b-r-default">
                                    <p class="text-muted m-b-5">Completed</p>
                                    <h5>{{ $completed_queue}}</h5>
                                </div>
                                <div class="col-4 b-r-default">
                                    <p class="text-muted m-b-5">Confirmed</p>
                                    <h5>{{ $confirmed_queue}}</h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted m-b-5">Pending</p>
                                    <h5>{{ $pending_queue}}</h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted m-b-5">Cancelled</p>
                                    <h5>{{ $cancelled_queue}}</h5>
                                </div>
                            </div>
                        </div>
                        <!-- <div id="tot-lead" style="height:150px"></div> -->
                    </div>
                    </div>
            <div class="col-xl-4 col-md-6">
            <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3">Appointment</h5>
                            <!-- <p class="text-c-green f-w-500"><i class="fa fa-caret-up m-r-15"></i> 18% High than last month</p> -->
                            <div class="row">
                                <div class="col-4 b-r-default">
                                    <p class="text-muted m-b-5">Completed</p>
                                    <h5>{{$completed_appointment}}</h5>
                                </div>
                                <div class="col-4 b-r-default">
                                    <p class="text-muted m-b-5">Scheduled</p>
                                    <h5>{{$scheduled_appointment}}</h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted m-b-5">Cancelled</p>
                                    <h5>{{$cancelled_appointment}}</h5>
                                </div>
                            </div>
                        </div>
                        <!-- <div id="tot-lead" style="height:150px"></div> -->
                    </div>
                    </div>
                   
            </div>
            </div>
        </div>
    </div>
</div>
@endsection