@extends('admin.includes.home')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('admin/online_consultations/update', $consultation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="patient_id">Patient</label>
                            <select name="patient_id" id="patient_id" class="form-control">
                                @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}" {{ $consultation->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="doctor_id">Doctor</label>
                            <select name="doctor_id" id="doctor_id" class="form-control">
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $consultation->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->doctor_name }}
                                </option>
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
                        <a href="{{ route('admin/online_consultations') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
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