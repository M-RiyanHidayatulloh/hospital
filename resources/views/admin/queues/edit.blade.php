<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Antrian</h1>
            <form action="{{ route('queues.update', $queue->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="appointment_id">ID Appointment</label>
                    <select class="form-control" id="appointment_id" name="appointment_id" required>
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}"
                                {{ $appointment->id == $queue->appointment_id ? 'selected' : '' }}>
                                {{ $appointment->id }} - {{ $appointment->patient_name }} dengan
                                {{ $appointment->doctor_name }} pada {{ $appointment->appointment_time }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="queue_number">Nomor Antrian</label>
                    <input type="number" class="form-control" id="queue_number" name="queue_number"
                        value="{{ $queue->queue_number }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="pending" {{ $queue->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $queue->status == 'confirmed' ? 'selected' : '' }}>Confirmed
                        </option>
                        <option value="completed" {{ $queue->status == 'completed' ? 'selected' : '' }}>Completed
                        </option>
                        <option value="cancelled" {{ $queue->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
