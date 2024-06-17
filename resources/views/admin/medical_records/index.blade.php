@extends('admin.includes.home')
@section('csstable')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('jstable')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $('#data-table').DataTable();
    })
</script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    confirmDelete = function(button) {
        var url = $(button).data('url');
        swal({
            'title': 'Konfirmasi Hapus',
            'text': 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
            'dangermode': true,
            'buttons': true
        }).then(function(value) {
            if (value) {
                window.location = url;
            }
        })
    }
</script>
@endsection
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard Medical Record</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard Medical Record</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <a href="{{ route('admin/medical_records/create') }}" class="btn btn-primary rounded-pill"><i class="fa fa-plus fa-md"></i> Add Medical Record</a>
    <a href="{{ route('admin/medical_records/trash') }}" class="btn btn-danger rounded-pill"><i class="fa fa-trash" aria-hidden="true"></i> Trash</a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-2">
        {{ $message }}
    </div>
    @endif
    </div>
    <div class="container mt-4">
        <div class="card">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="data-table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Room Number</th>
                                    <th class="text-center">Patient</th>
                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Diagnosis</th>
                                    <th class="text-center">Treatment</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($medical_records as $record)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $record->room->room_number }}</td>
                                    <td class="text-center">{{ $record->patient->name }}</td>
                                    <td class="text-center">{{ $record->doctor->name }}</td>
                                    <td class="text-center">{{ $record->diagnosis }}</td>
                                    <td class="text-center">{{ $record->treatment }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin/medical_records/edit', $record->id) }}" class="btn btn-warning rounded-pill"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                        <a onclick="confirmDelete(this)" data-url="{{ route('admin/medical_records/delete', ['id' => $record->id]) }}" class="btn btn-danger rounded-pill" role="button"><i class="fa fa-eraser" aria-hidden="true"></i> Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">Data Medical belum tersedia</div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection