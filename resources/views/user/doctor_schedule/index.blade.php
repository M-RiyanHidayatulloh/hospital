@include('home.css')
@include('home.header')
<section class="book_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <form>
                    <h4>
                        DOCTOR <span>SCHEDULE</span>
                    </h4>
                    @if (Auth::user()->usertype == 'doctor')
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Specialization</th>
                                    <th class="text-center">Working Days</th>
                                    <th class="text-center">Start Time</th>
                                    <th class="text-center">End Time</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="doctorScheduleTable">
                                @foreach ($schedules as $schedules)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $schedules->user->name }}</td>
                                        <td class="text-center">{{ $schedules->user->specialization }}</td>
                                        <td class="text-center">{{ $schedules->day_of_week }}</td>
                                        <td class="text-center">{{ $schedules->start_time }}</td>
                                        <td class="text-center">{{ $schedules->end_time }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('change-my-schedule', ['id' => $schedules->id]) }}"
                                                class="btn btn-warning rounded-pill"><i class="fa fa-edit"
                                                    aria-hidden="true"></i> Edit</a>
                                            {{-- <a onclick="confirmDelete(this)"
                                            data-url="{{ route('admin/schedules/delete', ['id' => $schedule->id]) }}"
                                            class="btn btn-danger rounded-pill" role="button"><i class="fa fa-eraser"
                                                aria-hidden="true"></i> Delete</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Specialization</th>
                                    <th class="text-center">Working Days</th>
                                    <th class="text-center">Start Time</th>
                                    <th class="text-center">End Time</th>
                                </tr>
                            </thead>
                            <tbody id="doctorScheduleTable">
                                @foreach ($schedule as $schedules)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $schedules->user->name }}</td>
                                        <td class="text-center">{{ $schedules->user->specialization }}</td>
                                        <td class="text-center">{{ $schedules->day_of_week }}</td>
                                        <td class="text-center">{{ $schedules->start_time }}</td>
                                        <td class="text-center">{{ $schedules->end_time }}</td>
                                        <td class="text-center">
                                            {{-- <a onclick="confirmDelete(this)"
                                        data-url="{{ route('admin/schedules/delete', ['id' => $schedule->id]) }}"
                                        class="btn btn-danger rounded-pill" role="button"><i class="fa fa-eraser"
                                            aria-hidden="true"></i> Delete</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
            </div>
        </div>
    </div>
</section>

@include('home.info')
@include('home.footer')
