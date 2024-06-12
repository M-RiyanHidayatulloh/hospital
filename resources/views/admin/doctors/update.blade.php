@extends('admin.includes.home')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('admin/doctors/update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="user_id">User ID</label>
                            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                            <option value="">Select User</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $doctor->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Doctor</label>
                            <input type="text" name="doctor_name" class="form-control" value="{{ $doctor->doctor_name }}">
                        </div>
                        <div class="form-group">
                            <label>Specialization</label>
                            <input type="text" name="specialization" class="form-control" value="{{ $doctor->specialization }}">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Available Times</label>
                            <input type="text" name="available_times" class="form-control" value="{{ $doctor->available_times }}" required>
                        </div>
                        <div class="form-group">
                            <label>Current Doctor Image</label><br>
                            <img src="{{ asset('storage/doctors/' . $doctor->image) }}" class="rounded" style="width: 100px"><br>
                            <label>Update Doctor Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <a href="{{ route('admin/doctors') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection