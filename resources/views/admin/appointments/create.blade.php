<div class="container">
    <h1>Add New Appointment</h1>
    <form action="{{ route('appointments.store') }}" method="POST">
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
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
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
        </div>
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
    <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
