<div class="container">
    <h1>Edit Room</h1>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" class="form-control" value="{{ $room->room_number }}" required>
        </div>
        <div class="form-group">
            <label for="room_type">Type</label>
            <select name="room_type" class="form-control" required>
                <option value="ICU" {{ $room->room_type == 'ICU' ? 'selected' : '' }}>ICU</option>
                <option value="General" {{ $room->room_type == 'General' ? 'selected' : '' }}>General</option>
                <option value="VIP" {{ $room->room_type == 'VIP' ? 'selected' : '' }}>VIP</option>
            </select>
        </div>
        <div class="form-group">
            <label for="availability">Status</label>
            <select name="availability" class="form-control" required>
                <option value="available" {{ $room->availability == 'available' ? 'selected' : '' }}>Available</option>
                <option value="occupied" {{ $room->availability == 'occupied' ? 'selected' : '' }}>Occupied</option>
                <option value="maintenance" {{ $room->availability == 'maintenance' ? 'selected' : '' }}>Maintenance
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" class="form-control" value="{{ $room->capacity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
