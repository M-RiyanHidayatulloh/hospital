@extends('admin.includes.home')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard Create</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin/health_informations') }}">Dashboard Health Information</a></li>
                    <li class="breadcrumb-item"><a href="#!">Create</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header-title">
                <h2 class="m-b-10">Add New Health Information</h2>
            </div>
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    @if (session()->has('error'))
                    <div>
                        {{ Session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('admin/health_informations/store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">category</label>
                            <input type="text" name="category" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image">image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <a href="{{ route('admin/health_informations') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
