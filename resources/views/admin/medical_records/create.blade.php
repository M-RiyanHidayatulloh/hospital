@extends('admin.includes.home')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard Create</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin/medical_records') }}">Dashboard Medical Record</a></li>
                    <li class="breadcrumb-item"><a href="#!">Create</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header-title">
                <h2 class="m-b-10">Add New Medical Record</h2>
            </div>
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    @if (session()->has('error'))
                    <div>
                        {{ Session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('admin/medical_records/store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                        <div class="form-group">
                                <label for="room_id">Room Number *</label>
                                <select name="room_id" class="form-control" required>
                                    @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="patient_user_id">Patient Name *</label>
                            <select name="patient_user_id" id="patient_user_id" class="form-control" required>
                                <option value="">Select Patient</option>
                                @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doctor_user_id">Doctor Name *</label>
                            <select name="doctor_user_id" id="doctor_user_id" class="form-control" required>
                                <option value="">Select Doctor</option>
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="form-group">
                                <label for="diagnosis">Diagnosis</label>
                                <textarea name="diagnosis" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="treatment">Treatment</label>
                                <textarea name="treatment" class="form-control" required></textarea>
                            </div>
                            <a href="{{ route('admin/medical_records') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-pill">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection