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
                    <h5 class="m-b-10">Dashboard Online Consultation</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard Online Consultation</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <a href="{{ route('admin/online_consultations/create') }}" class="btn btn-primary rounded-pill">Create New Consultation</a>
    <a href="{{ route('admin/online_consultations/trash') }}" class="btn btn-danger rounded-pill">Trash</a>
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
                                <th class="text-center">Patient</th>
                                <th class="text-center">Doctor</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Mode</th>
                                <th class="text-center">Note</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($online_consultations as $consultation)
                            <tr>
                                <td class="text-center">{{ $consultation->id }}</td>
                                <td class="text-center">{{ $consultation->patient->name }}</td>
                                <td class="text-center">{{ $consultation->doctor->doctor_name }}</td>
                                <td class="text-center">{{ $consultation->consultation_date }}</td>
                                <td class="text-center">{{ $consultation->consultation_mode }}</td>
                                <td class="text-center">{!! $consultation->notes !!}</td>
                                <td class="text-center">
                                <a href="{{ route('admin/online_consultations/edit', ['id'=>$consultation->id]) }}" class="btn btn-warning rounded-pill">Edit</a>
                                    <a onclick="confirmDelete(this)" data-url="{{ route('admin/online_consultations/delete', ['id'=>$consultation->id]) }}" class="btn btn-danger rounded-pill" role="button">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">Data Online Consultation belum tersedia</div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection