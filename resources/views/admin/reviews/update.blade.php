@extends('admin.includes.home')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-1 shadow-md rounded">
                    <div class="card-body">
                        <form action="{{ route('admin/reviews/update', ['id' => $review->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user_id">User ID</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $user->id == $review->user_id ? 'selected' : '' }}>
                                            {{ $user->id }} - {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content">Review Content</label>
                                <textarea class="form-control" id="content" name="content" rows="3" required>{{ $review->content }}</textarea>
                            </div>
                            <a href="{{ route('admin/reviews') }}" class="btn btn-danger mr-2 rounded-pill"
                                role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
