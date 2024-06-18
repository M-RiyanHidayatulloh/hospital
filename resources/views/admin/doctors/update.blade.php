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
                        <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i
                                    class="feather icon-home"></i></a></li>
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
                        <form action="{{ route('admin/doctors/update', $doctor->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <input type="hidden" name="usertype" value="doctor">
                            <div class="form-group">
                                <label for="user_id">Doctor Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $doctor->name }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}"
                                    required>
                                @error('phone')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $doctor->address }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" name="date_of_birth" class="form-control"
                                    value="{{ $doctor->date_of_birth }}" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror " required>
                                    <option value="{{ $doctor->gender }}">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <div class="form-group">
                                    <label for="specialization">Specialization</label>
                                    <input type="text" name="specialization"
                                        value="{{ old('specialization', $doctor->specialization) }}" class="form-control"
                                        value="{{ $doctor->specialization }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" name="amount" class="form-control" value="{{ $doctor->amount }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Current Doctor Image</label><br>
                                <img src="{{ asset('storage/profile-image/' . $doctor->profile_image) }}" class="rounded"
                                    style="width: 100px"><br>
                                <label>Update Doctor Image</label>
                                <input type="file" name="profile_image" class="form-control" onchange="loadFile(event)">
                                <img id="output" class="img-fluid mt-2 mb-4" width="100" />
                            </div>
                            <a href="{{ route('admin/doctors') }}" class="btn btn-danger mr-2 rounded-pill"
                                role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
