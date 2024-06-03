<div class="container">
    <h1>Add New Appointment</h1>
    <form action="{{ route('appointments.update', $appointment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" class="form-control" required>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" class="form-control" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="room_id">Room (optional)</label>
            <select name="room_id" class="form-control">
                <option value="">None</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $appointment->room_id == $room->id ? 'selected' : '' }}>
                        {{ $room->room_number }}</option>
                @endforeach
        </div>
        </select>
</div>
<div class="form-group">
    <label for="appointment_date">Appointment Date</label>
    <input type="datetime-local" name="date" class="form-control" value="{{ $appointment->date }}" required>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select name="status" class="form-control" required>
        <option value="scheduled" {{ $appointment->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
        <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
        <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select>
    <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
