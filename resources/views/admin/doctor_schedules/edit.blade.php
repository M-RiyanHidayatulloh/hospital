<div class="container">
    <h1>Edit Doctor Schedule</h1>
    <form action="{{ route('doctor_schedules.update', $doctor_schedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option value="">Select Doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}"
                        {{ $doctor->id == $doctor_schedule->doctor_id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="day_of_week">Day of Week</label>
            <select name="day_of_week" id="day_of_week" class="form-control" required>
                <option value="">Select Day</option>
                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                    <option value="{{ $day }}" {{ $day == $doctor_schedule->day_of_week ? 'selected' : '' }}>
                        {{ $day }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time" name="start_time" id="start_time" class="form-control"
                value="{{ $doctor_schedule->start_time }}" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time" name="end_time" id="end_time" class="form-control"
                value="{{ $doctor_schedule->end_time }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Schedule</button>
    </form>
</div>
