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
                                <th>No</th>
                                <th>Doctor</th>
                                <th>Working Days</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody id="doctorScheduleTable">
                            <!-- Data will be loaded dynamically here -->
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</section>

@include('home.info')
@include('home.footer')
