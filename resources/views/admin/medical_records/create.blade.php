@extends('admin.includes.home')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header-title">
                <h1 class="m-b-10">Add New Medical Record</h1>
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
                                <label for="patient_id">Patient</label>
                                <select name="patient_id" class="form-control" required>
                                    @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="doctor_id">Doctor</label>
                                <select name="doctor_id" class="form-control" required>
                                    @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
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
                            <a href="{{ route('admin/medical_records') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
                            <button type="submit" class="btn btn-primary rounded-pill">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection