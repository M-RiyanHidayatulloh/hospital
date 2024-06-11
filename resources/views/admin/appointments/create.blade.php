@extends('admin.includes.home')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header-title">
                <h1 class="m-b-10">Add New Appointment</h1>
            </div>
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    @if (session()->has('error'))
                    <div>
                        {{ Session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('admin/appointments/store') }}" method="POST">
                        @csrf
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
                            <label for="room_id">Room (optional)</label>
                            <select name="room_id" class="form-control">
                                <option value="">None</option>
                                @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="appointment_date">Appointment Date</label>
                            <input type="datetime-local" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="scheduled">Scheduled</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            </div>
                            <a href="{{ route('admin/appointments') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
                            <button type="submit" class="btn btn-primary rounded-pill">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection