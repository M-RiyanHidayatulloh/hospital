<div class="container">
    <h1>Rooms</h1>
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-2">Add New Room</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Room Number</th>
                <th>Type</th>
                <th>Status</th>
                <th>Capacity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->availability }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
