@include('home.css')
@include('home.header')
<section class="book_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <form>
                    <h4>
                        MEDICAL<span> RECORD</span>
                    </h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Room</th>
                                <th>Diagnosis</th>
                                <th>Treatment</th>
                            </tr>
                        </thead>

                        @foreach ($medicalRecords as $record)
                            <tr>
                                <td>{{ $record->id }}</td>
                                <td>{{ $record->patient->name }}</td>
                                <td>{{ $record->doctor->name }}</td>
                                <td>{{ $record->room ? $record->room->room_number : 'None' }}</td>
                                <td>{{ $record->diagnosis }}</td>
                                <td>{{ $record->treatment }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>

@include('home.info')
@include('home.footer')
