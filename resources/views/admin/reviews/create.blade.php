@extends('admin.includes.home')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h1 class="m-b-10">Add New Review</h1>
                </div>
                <div class="card border-1 shadow-md rounded">
                    <div class="card-body">
                        @if (session()->has('error'))
                            <div>
                                {{ Session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('admin/reviews/store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="user_id">User ID</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->id }} - {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content">Review Content</label>
                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                            </div>
                            <a href="{{ route('admin/reviews') }}" class="btn btn-danger mr-2 rounded-pill"
                                role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-pill">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
