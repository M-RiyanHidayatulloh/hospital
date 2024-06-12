@extends('admin.includes.home')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header-title">
                <h1 class="m-b-10">Add New Payment</h1>
            </div>
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    @if (session()->has('error'))
                    <div>
                        {{ Session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('admin/payments/store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="appointment_id">Appointment</label>
                            @if ($appointments->isEmpty())
                                <p>No appointments available</p>
                            @else
                                <select name="appointment_id" class="form-control" required>
                                    @foreach ($appointments as $appointment)
                                    <option value="{{ $appointment->id }}">{{ $appointment->id }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="patient_id">Patient Name</label>
                            @if ($patients->isEmpty())
                                <p>No patients available</p>
                            @else
                                <select name="patient_id" class="form-control" required>
                                    @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="payment_date">Payment Date</label>
                            <input type="datetime-local" name="payment_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending">Pending</option>
                                <option value="paid">Paid</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <a href="{{ route('admin/payments') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
