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
                        < <thead>
                            <tr>
                                <th>No</th>
                                <th>Doctor</th>
                                <th>Working Days</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                            </thead>
                            @foreach ($doctor_schedules as $doctor_schedule)
                                <td class="card-title">{{ $doctor_schedule->id }}</td>
                                <td class="card-title">{{ $doctor_schedule->doctor->name }}</td>
                                <td class="card-title">{{ $doctor_schedule->working_days }}</td>
                                <td class="card-title">{{ $doctor_schedule->start_time }}</td>
                                <td class="card-title">{{ $doctor_schedule->end_time }}</td>
                            @endforeach
                            </tbody>
                    </table>
            </div>
        </div>
    </div>
</section>

@include('home.info')
@include('home.footer')
