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
                                <td class="text-center">{{ $schedules->day_of_week}}</td>
                                <td class="text-center">{{ $schedules->start_time}}</td>
                                <td class="text-center">{{ $schedules->end_time}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</section>

@include('home.info')
@include('home.footer')
