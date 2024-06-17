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
                    <h5 class="m-b-10">Dashboard Trash</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin/queues') }}">Dashboard Queue</a></li>
                    <li class="breadcrumb-item"><a href="#!">Trash</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
<a href="{{ route('admin/queues/restore') }}" class="btn btn-warning rounded-pill">Restore All</a>
<a href="{{ route('admin/queues/destroy') }}" class="btn btn-danger rounded-pill">Delete All</a>
    <a href="{{ route('admin/queues') }}" class="btn btn-secondary rounded-pill">Back</a>
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
                                <th class="text-center">Appointment ID</th>
                                <th class="text-center">Queue Number</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($queues as $queue)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $queue->appointment_id }}</td>
                                <td class="text-center">{{ $queue->queue_number }}</td>
                                <td class="text-center">{{ $queue->status }}</td>
                                <td class="text-center">
                                    <a href="{{route('admin/queues/restore', ['id'=>$queue->id])}}" class="btn btn-warning rounded-pill">Restore</a>
                                    <a onclick="confirmDelete(this)" data-url="{{ route('admin/queues/destroy', ['id'=>$queue->id]) }}" class="btn btn-danger rounded-pill">Delete Permanently</a>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">Data Antrian belum tersedia</div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
