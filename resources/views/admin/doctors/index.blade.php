<head>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
</head>



<!-- File index.blade.php -->
<div class="container mt-5">
    <h1>Doctors</h1>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add New Doctor</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif
</div>
<div class="container mt-5">
    <div class="card">
        <div class="col-lg-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-hover table-bordered" id="datatables">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Specialization</th>
                                <th>Phone</th>
                                <th>Available Times</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->specialization }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->available_times }}</td>
                                    <td>
                                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "lengthChange": false,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true
        });
    });
</script>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    function confirmDelete(button) {
        var url = $(button).data('url');
        swal({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
            dangerMode: true,
            buttons: true
        }).then(function(value) {
            if (value) {
                window.location = url;
            }
        });
    }
</script>

