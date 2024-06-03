<div class="container">
    <h1>Edit Payment</h1>
    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="appointment_id">Appointment</label>
            <select name="appointment_id" class="form-control" required>
                @foreach ($appointments as $appointment)
                    <option value="{{ $appointment->id }}"
                        {{ $payment->appointment_id == $appointment->id ? 'selected' : '' }}>{{ $appointment->id }}
                    </option>
                @endforeach
            </select>
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
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
