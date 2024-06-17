@include('home.css')
@include('home.header')

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4>Payment Information</h4>
            <div class="card">
                <div class="card-body">
                    <form id="payment-form" method="POST" action="{{ route('process-payment') }}">
                        @csrf
                        <input type="hidden" name="doctor_id" id="doctor-id" value="{{ $doctor->id }}">
                        <input type="hidden" name="amount" id="amount" value="{{ $doctor->amount }}">
                        <input type="hidden" id="snap-token" name="snap-token" value="{{ $snapToken }}">

                        <div class="mb-3">
                            <label for="patientName" class="form-label">Patient Name:</label>
                            <input type="text" class="form-control" id="patientName" value="{{ Auth::user()->name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="doctor-name" class="form-label">Doctor Name:</label>
                            <input type="text" class="form-control" value="{{ $doctor->name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="specialist" class="form-label">Specialist:</label>
                            <input type="text" class="form-control" value="{{ $doctor->specialist }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount:</label>
                            <input type="text" class="form-control" value="Rp {{ number_format($doctor->amount, 0, ',', '.') }}" readonly>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" id="pay-button" class="btn btn-primary">Pay for Consultation</button>
                            <a href="{{ url('/online') }}" id="back-button" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @foreach ($doctor as $item)
<div class="modal fade" id="consultationFormModal{{ $item->id }}" tabindex="-1" aria-labelledby="consultationFormModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="consultationFormModalLabel{{ $item->id }}">Consultation Form</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store-online-consultations') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $item->id }}">
                    <input type="hidden" name="amount" value="{{ $item->amount }}">
                    <div class="mb-3">
                        <label for="patientName" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="patientName" value="{{ Auth::user()->name }}" readonly name="patientName">
                    </div>
                    <div class="mb-3">
                        <label for="patientEmail" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="patientEmail" name="patientEmail" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="patientPhone" class="form-label">Your Phone</label>
                        <input type="tel" class="form-control" id="patientPhone" name="patientPhone" value="{{ Auth::user()->phone }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount:</label>
                        <input type="text" class="form-control" value="Rp {{ number_format($item->amount, 0, ',', '.') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="consultationDetails" class="form-label">Note</label>
                        <textarea class="form-control" id="consultationDetails" name="notes" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach --}}


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-rc97thwHV6vjF9eD"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function() {
        snap.pay(document.getElementById('snap-token').value, {
            onSuccess: function(result) {
                window.location.href = '/payment-success';
            },
            onPending: function(result) {
                window.location.href = '/payment-pending';
            },
            onError: function(result) {
                window.location.href = '/payment-failed';
            },
            onClose: function() {
                alert('You closed the popup without finishing the payment');
            }
        });
    });
</script>


<?php

if (!function_exists('formatNumber')) {
    function formatNumber($number) {
        return number_format($number, 0, ',', '.');
    }
}

@include('home.footer')
