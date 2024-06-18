@include('home.css')
@include('home.header')
<!DOCTYPE html>
<html lang="en">

{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Janji Temu Pasiennn</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        input[type="text"] {
            width: 100px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head> --}}

<body>


    <section class="book_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="{{ route('set-appointment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h4>
                            BOOK <span>APPOINTMENT</span>
                        </h4>
                        <div class="form-row ">
                            <div class="form-group col-lg-4">
                                <label for="inputPatientName">Your Name </label>
                                <input type="text" class="form-control" id="inputPatientName"
                                    value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputPhone">Your Phone Number</label>
                                <input type="number" class="form-control" id="inputPhone"
                                    value="{{ Auth::user()->phone }}" readonly>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputDoctorName">Doctor's Name</label>
                                <select name="doctor_id" class="form-control wide" id="inputDoctorName" required>
                                    <option>
                                        <- Pilih ->
                                    </option>
                                    @foreach ($doctors as $item)
                                        <option value="{{ $item->id }}">Nama : {{ $item->name }} | Ahli :
                                            {{ $item->specialization }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputDepartmentName">Room</label>
                                <select name="room_id" class="form-control wide" id="inputDepartmentName" required>
                                    <option>
                                        <- Pilih ->
                                    </option>
                                    @foreach ($rooms as $item)
                                        <option value="{{ $item->id }}">Nama : {{ $item->room_number }} | Jenis :
                                            {{ $item->room_type }} | Kapasitas : {{ $item->capacity }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputDate">Choose Date </label>
                                <div class="input-group date" data-date-format="mm-dd-yyyy">
                                    <input type="date" name="date" class="form-control" required>
                                    {{-- <input type="time" id="appt-time" name="appt-time" min="00:00" max="23:59" required> --}}
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button type="submit" class="btn ">Submit Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="book_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Dokter</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Tanggal Pertemuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->room->room_number }}</td>
                                    <td>{{ $item->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
