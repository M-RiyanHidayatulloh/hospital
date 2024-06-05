<div class="container">
    <h1>Doctor Schedules</h1>
    <a href="{{ route('doctor_schedules.create') }}" class="btn btn-primary mb-3">Add New Schedule</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Doctor</th>
                <th>Day of Week</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctor_schedules as $doctorSchedule)
                <tr>
                    <td>{{ $doctorSchedule->id }}</td>
                    <td>{{ $doctorSchedule->doctor->name }}</td>
                    <td>{{ $doctorSchedule->day_of_week }}</td>
                    <td>{{ $doctorSchedule->start_time }}</td>
                    <td>{{ $doctorSchedule->end_time }}</td>
                    <td>
                        <a href="{{ route('doctor_schedules.edit', $doctorSchedule->id) }}"
                            class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('doctor_schedules.destroy', $doctorSchedule->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
