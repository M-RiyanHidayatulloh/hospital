@extends('admin.includes.home')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard Profile</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-2">
        {{ $message }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.dashboard.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        
                        <div class="form-group">
                            <label for="image">Image</label>
                            @if ($user->image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($user->image) }}" alt="Profile Image" class="img-thumbnail" width="150">
                            </div>
                            @endif
                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800">
                                    {{ __('Your email address is unverified.') }}

                                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                                @endif
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                        <a href="{{ route('admin/dashboard') }}" class="btn btn-danger mr-2 rounded-pill" role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-pill">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
