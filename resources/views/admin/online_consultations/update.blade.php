@extends('admin.includes.home')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard Update</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin/online_consultations') }}">Dashboard Online Consultation</a></li>
                    <li class="breadcrumb-item"><a href="#!">Update</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
        <div class="page-header-title">
                <h2 class="m-b-10">Update Online Consultation</h2>
            </div>
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('admin/online_consultations/update', $consultation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="patient_user_id">Patient Name</label>
                            <select name="patient_user_id" id="patient_user_id" class="form-control" required>
                                <option value="">Select Patient</option>
                                @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                         <label for="doctor_user_id">Doctor Name</label>
                            <select name="doctor_user_id" id="doctor_user_id" class="form-control" required>
                                <option value="">Select Doctor</option>
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="consultation_date">Consultation Date</label>
                            <input type="date" name="consultation_date" id="consultation_date" class="form-control" value="{{ $consultation->consultation_date }}">
                        </div>

                        <div class="form-group">
                            <label for="consultation_mode">Consultation Mode</label>
                            <select name="consultation_mode" id="consultation_mode" class="form-control">
                                <option value="Chat" {{ $consultation->consultation_mode == 'Chat' ? 'selected' : '' }}>Chat
                                </option>
                                <option value="Video" {{ $consultation->consultation_mode == 'Video' ? 'selected' : '' }}>Video
                                </option>
                                <option value="Audio" {{ $consultation->consultation_mode == 'Audio' ? 'selected' : '' }}>Audio
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea name="notes" id="notes" class="form-control">{{ $consultation->notes }}</textarea>
                        </div>
                        <a href="{{ route('admin/online_consultations') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'notes' );
</script>
@endsection