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
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin/reviews') }}">Dashboard Review</a></li>
                        <li class="breadcrumb-item"><a href="#!">Trash</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <a href="{{ route('admin/reviews/restoreAll') }}" class="btn btn-warning rounded-pill">Restore All</a>
        <a href="{{ route('admin/reviews/destroyAll') }}" class="btn btn-danger rounded-pill">Delete All</a>
        <a href="{{ route('admin/reviews') }}" class="btn btn-secondary rounded-pill">Back</a>
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
                                    <th class="text-center">User ID</th>
                                    <th class="text-center">Review Content</th>
                                    <th class="text-center">Rating</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $review)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $review->user_id }}</td>
                                        <td class="text-center">{{ $review->content }}</td>
                                        <td class="text-center">{{ $review->rating }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin/reviews/restore', ['id' => $review->id]) }}"
                                                class="btn btn-warning rounded-pill">Restore</a>
                                            <a onclick="confirmDelete(this)"
                                                data-url="{{ route('admin/reviews/destroy', ['id' => $review->id]) }}"
                                                class="btn btn-danger rounded-pill">Delete Permanently</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">No reviews available in trash</div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
