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
                    <h5 class="m-b-10">Dashboard Doctor</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard Doctor</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <a href="{{ route('admin/doctors/create') }}" class="btn btn-primary rounded-pill"><i class="fa fa-user-plus fa-md"></i> Add Doctor</a>
    <a href="{{ route('admin/doctors/trash') }}" class="btn btn-danger rounded-pill"><i class="fa fa-trash" aria-hidden="true"></i> Trash</a>
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
                                <th class="text-center">Name</th>
                                <th class="text-center">Doctor Photo</th>
                                <th class="text-center">Specialization</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Available Times</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $doctor)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $doctor->user->name }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/doctors/' . $doctor->image) }}" class="rounded" style="width: 50px">
                                </td>
                                <td class="text-center">{{ $doctor->user->specialization }}</td>
                                <td class="text-center">{{ $doctor->phone }}</td>
                                <td class="text-center">{{ $doctor->available_times }}</td>
                                <td class="text-center">
                                    <a href="{{route('admin/doctors/edit', ['id'=>$doctor->id])}}" class="btn btn-warning rounded-pill"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                    <a onclick="confirmDelete(this)" data-url="{{ route('admin/doctors/delete', ['id'=>$doctor->id]) }}" class="btn btn-danger rounded-pill"><i class="fa fa-eraser" aria-hidden="true"></i> Delete</a>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">Data Doctor belum tersedia</div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
