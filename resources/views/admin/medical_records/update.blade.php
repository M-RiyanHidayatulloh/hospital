@extends('admin.includes.home')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('admin/medical_records/update', $record->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="patient_id">Patient</label>
                            <select name="patient_id" class="form-control" required>
                                @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}" {{ $record->patient_id == $patient->id ? 'selected' : '' }}>
                                    {{ $patient->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doctor_id">Doctor</label>
                            <select name="doctor_id" class="form-control" required>
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $record->doctor_id == $doctor->id ? 'selected' : '' }}>
                                    {{ $doctor->doctor_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="diagnosis">Diagnosis</label>
                            <textarea name="diagnosis" class="form-control" required>{{ $record->diagnosis }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="treatment">Treatment</label>
                            <textarea name="treatment" class="form-control" required>{{ $record->treatment }}</textarea>
                        </div>
                        <a href="{{ route('admin/medical_records') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection