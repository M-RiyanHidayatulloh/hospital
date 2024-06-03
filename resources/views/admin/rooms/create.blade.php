<div class="container">
    <h1>Add New Room</h1>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <!-- Kolom id dihapus karena akan di-generate otomatis oleh database -->
        </div>
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="room_type">Type</label>
            <select name="room_type" class="form-control" required>
                <option value="ICU">ICU</option>
                <option value="General">General</option>
                <option value="VIP">VIP</option>
            </select>
        </div>
        <div class="form-group">
            <label for="availability">Status</label>
            <select name="availability" class="form-control" required>
                <option value="available">Available</option>
                <option value="occupied">Occupied</option>
                <option value="maintenance">Maintenance</option>
            </select>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
