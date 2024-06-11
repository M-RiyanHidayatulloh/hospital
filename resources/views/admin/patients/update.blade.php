@extends('admin.includes.home')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('admin/patients/update', $patient->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $patient->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $patient->name }}" required>
                            @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $patient->address }}" required>
                            @error('address')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $patient->phone }}" required>
                            @error('phone')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ $patient->birthdate }}" required>
                            @error('birthdate')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ $patient->description }}</textarea>
                            @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <a href="{{ route('admin/patients') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection