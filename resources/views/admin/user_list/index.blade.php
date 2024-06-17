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
                        <h5 class="m-b-10">Dashboard User</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard User</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <a href="{{ route('admin/user_list/create') }}" class="btn btn-primary rounded-pill">Add New User</a>
        <a href="{{ route('admin/user_list/trash') }}" class="btn btn-danger rounded-pill">Trash</a>
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
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Usertype</th>
                                    <th class="text-center">profile_image</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">date_of_birth</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Specialization</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->id }}</td>
                                        {{-- <td class="text-center">{{ $loop->iteration }}</td> --}}
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->usertype }}</td>
                                        <td class="text-center">{{ $user->profile_image }}</td>
                                        <td class="text-center">{{ $user->phone }}</td>
                                        <td class="text-center">{{ $user->address }}</td>
                                        <td class="text-center">{{ $user->date_of_birth }}</td>
                                        <td class="text-center">{{ $user->gender }}</td>
                                        <td class="text-center">{{ $user->specialization }}</td>
                                        <td class="text-center">{{ $user->amount }}</td>
                                        <td class="text-center">{{ $user->password }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin/user_list/edit', ['id' => $user->id]) }}"
                                                class="btn btn-warning rounded-pill">Edit</a>
                                            <a onclick="confirmDelete(this)"
                                                data-url="{{ route('admin/user_list/destroy', ['user' => $user->id]) }}"
                                                class="btn btn-danger rounded-pill">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">Data User belum tersedia</div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
