@extends('admin.includes.home')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header-title">
                <h1 class="m-b-10">Add New Queue</h1>
            </div>
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    @if (session()->has('error'))
                    <div>
                        {{ Session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('admin/queues/store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="appointment_id">ID Appointment</label>
                            <select class="form-control" id="appointment_id" name="appointment_id" required>
                                @foreach ($appointments as $appointment)
                                <option value="{{ $appointment->id }}">
                                    {{ $appointment->id }} - {{ $appointment->patient->name }} dengan
                                    {{ $appointment->doctor->doctor_name }} pada {{ $appointment->date }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="queue_number">Nomor Antrian</label>
                            <input type="number" class="form-control" id="queue_number" name="queue_number" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <a href="{{ route('admin/queues') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection