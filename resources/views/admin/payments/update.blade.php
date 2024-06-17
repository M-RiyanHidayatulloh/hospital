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
                    <li class="breadcrumb-item"><a href="{{ route('admin/payments') }}">Dashboard Payment</a></li>
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
                <h2 class="m-b-10">Update Payment Data</h2>
            </div>
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('admin/payments/update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="appointment_id">Appointment</label>
                            <select name="appointment_id" class="form-control" required>
                                @foreach ($appointments as $appointment)
                                <option value="{{ $appointment->id }}" {{ $payment->appointment_id == $appointment->id ? 'selected' : '' }}>{{ $appointment->id }}
                                </option>
                                @endforeach
                            </select>
                        </div>
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
                            <label for="payment_date">Payment Date</label>
                            <input type="datetime-local" name="payment_date" class="form-control" value="{{ $payment->payment_date }}" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" class="form-control" value="{{ $payment->amount }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="cancelled" {{ $payment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <a href="{{ route('admin/payments') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
