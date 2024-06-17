@extends('admin.includes.home')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('admin/schedules/update', ['id' => $schedule->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="doctor_name">Nama Doktor</label>
                            <select name="doctor_id" id="doctor_id" class="form-control" required="required">
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}{{old('doctor_name')}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="specialization">Specialization</label>
                            <select name="doctor_id" id="doctor_id" class="form-control" required="required">
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->specialization }}{{old('specialization')}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="day_of_week">Day of Week</label>
                            <select name="day_of_week" id="day_of_week" class="form-control" required>
                                <option value="">Select Day</option>
                                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                <option value="{{ $day }}" {{ $day == $schedule->day_of_week ? 'selected' : '' }}>
                                    {{ $day }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <input type="time" name="start_time" class="form-control" placeholder="Start Time" value="{{old('start_time', $schedule->start_time)}}">
                            @error('start_time')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <input type="time" name="end_time" class="form-control" placeholder="End Time" value="{{old('end_time', $schedule->end_time)}}">
                            @error('end_time')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <a href="{{ route('admin/schedules') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
                        <button class="btn btn-primary rounded-pill">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection