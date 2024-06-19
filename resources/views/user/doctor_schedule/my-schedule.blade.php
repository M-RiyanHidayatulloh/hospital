@include('home.css')
@include('home.header')
<section class="book_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('set-change-my-schedule', ['id' => $schedule->id]) }}" method="POST"
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
</section>

@include('home.info')
@include('home.footer')
