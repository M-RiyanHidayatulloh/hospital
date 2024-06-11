@extends('admin.includes.home')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('admin/rooms/update', ['id' => $room->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Room Number</label>
                            <input type="text" name="room_number" class="form-control" value="{{ old('room_number', $room->room_number) }}" required>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="room_type" class="form-control" required>
                                <option value="ICU" {{ $room->room_type == 'ICU' ? 'selected' : '' }}>ICU</option>
                                <option value="General" {{ $room->room_type == 'General' ? 'selected' : '' }}>General</option>
                                <option value="VIP" {{ $room->room_type == 'VIP' ? 'selected' : '' }}>VIP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="availability" class="form-control" required>
                                <option value="available" {{ $room->availability == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="occupied" {{ $room->availability == 'occupied' ? 'selected' : '' }}>Occupied</option>
                                <option value="maintenance" {{ $room->availability == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Capacity</label>
                            <input type="text" name="capacity" class="form-control" value="{{old('capacity', $room->capacity)}}">
                            @error('capacity')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <a href="{{ route('admin/rooms') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection