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
                        <h5 class="m-b-10">Dashboard Review</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard Review</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <a href="{{ route('admin/reviews/trash') }}" class="btn btn-danger rounded-pill">Trash</a>
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
                                    <th class="text-center">Review Content</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $review)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $review->user->name }}</td>
                                        <td class="text-center">{{ $review->content }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin/reviews/edit', $review->id) }}"
                                                class="btn btn-warning rounded-pill">Edit</a>
                                            <a onclick="confirmDelete(this)"
                                                data-url="{{ route('admin/reviews/delete', ['id' => $review->id]) }}"
                                                class="btn btn-danger rounded-pill" role="button">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">Data Review belum tersedia</div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
