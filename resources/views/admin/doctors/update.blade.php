@extends('admin.includes.home')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard Update</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin/doctors') }}">Dashboard Doctor</a></li>
                    <li class="breadcrumb-item"><a href="#!">Update</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header-title">
                <h2 class="m-b-10">Update Doctor Data</h2>
            </div>
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('admin/doctors/update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="user_id">Doctor Name</label>
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
                            <label for="specialization">Specialization</label>
                            <select name="specialization" id="specialization" class="form-control" required>
                                <option value="">Select Specialization</option>
                                @foreach ($users as $user)
                                    @if (!is_null($user->specialization))
                                        <option value="{{ $user->specialization }}" {{ $doctor->specialization == $user->specialization ? 'selected' : '' }}>
                                            {{ $user->specialization }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $doctor->phone }}" required>
                            @error('phone')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Available Times</label>
                            <input type="text" name="available_times" class="form-control @error('available_times') is-invalid @enderror" value="{{ $doctor->available_times }}" required>
                            @error('available_times')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Current Doctor Image</label><br>
                            <img src="{{ asset('storage/doctors/' . $doctor->image) }}" class="rounded" style="width: 100px"><br>
                            <label>Update Doctor Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <a href="{{ route('admin/doctors') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
