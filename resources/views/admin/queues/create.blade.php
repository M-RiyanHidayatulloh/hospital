<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Buat Antrian Baru</h1>
            <form action="{{ route('queues.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="appointment_id">ID Appointment</label>
                    <select class="form-control" id="appointment_id" name="appointment_id" required>
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}">
                                {{ $appointment->id }} - {{ $appointment->patient_name }} dengan
                                {{ $appointment->doctor_name }} pada {{ $appointment->appointment_time }}
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
