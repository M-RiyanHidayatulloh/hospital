@extends('admin.includes.home')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10 weight-bold">Dashboard Update</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i
                                    class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin/schedules') }}">Dashboard Doctor's Schedule</a>
                        </li>
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
                    <h2 class="m-b-10">Update Doctor's Schedule</h2>
                </div>
                <div class="card border-1 shadow-md rounded">
                    <div class="card-body">
                        <form action="{{ route('admin/schedules/update', ['id' => $schedule->id]) }}" method="POST"
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
                            <div class="form-group">
                                <label for="user_id">Doctor Name</label>
                                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                                    <option value="">Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $schedule->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }} | {{ $user->specialization }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="specialization">Specialization</label>
                                <select name="specialization" id="specialization" class="form-control" required>
                                    <option value="">Select Specialization</option>
                                    @foreach ($users as $user)
                                        @if (!is_null($user->specialization))
                                            <option value="{{ $user->specialization }}"
                                                {{ $schedule->specialization == $user->specialization ? 'selected' : '' }}>
                                                {{ $user->specialization }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="day_of_week">Day of Week</label>
                                <select name="day_of_week" id="day_of_week" class="form-control" required>
                                    <option value="">Select Day</option>
                                    @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                        <option value="{{ $day }}"
                                            {{ $day == $schedule->day_of_week ? 'selected' : '' }}>
                                            {{ $day }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="time" name="start_time" class="form-control" placeholder="Start Time"
                                    value="{{ old('start_time', $schedule->start_time) }}">
                                @error('start_time')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input type="time" name="end_time" class="form-control" placeholder="End Time"
                                    value="{{ old('end_time', $schedule->end_time) }}">
                                @error('end_time')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <a href="{{ route('admin/schedules') }}" class="btn btn-danger mr-2 rounded-pill"
                                role="button">Cancel</a>
                            <button class="btn btn-primary rounded-pill">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
