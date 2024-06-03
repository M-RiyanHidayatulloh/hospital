<div class="container">
    <h1>Appointments</h1>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Add New Appointment</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Room</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->room ? $appointment->room->room_number : 'None' }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment->id) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
