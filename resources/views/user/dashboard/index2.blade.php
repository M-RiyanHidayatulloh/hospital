@include('home.css')
@include('home.header')

<body>
    <div class="container mt-5">
        <div></div>
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @php($profile_image = auth()->user()->profile_image)
                                <img src="{{ asset("storage/profile-image/$profile_image") }}" alt=""
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->phone }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date of Birth</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->date_of_birth }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->address }}
                                </div>
                            </div>
                            <hr>
                            <!-- Diagnosa Section -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Diagnosa</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->diagnosa }}
                                </div>
                            </div>
                            <hr>
                            <!-- Room Section -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Room</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->room }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary btn-block" data-toggle="modal"
                                        data-target="#editProfileModal">Ubah
                                        profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProfileModalLabel">Save</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('profile.update', $profile->id) }}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="name">Nama:</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ $profile->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="date_of_birth">Year of Birth:</label>
                                            <input type="date" id="date_of_birth" name="date_of_birth"
                                                class="form-control" value="{{ $profile->date_of_birth }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Nomor Telepon:</label>
                                            <input type="text" id="phone" name="phone" class="form-control"
                                                value="{{ $profile->phone }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ $profile->email }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Alamat:</label>
                                            <textarea name="address" id="address" rows="3" class="form-control">{{ $profile->address }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="diagnosa">Diagnosa:</label>
                                            <textarea name="diagnosa" id="diagnosa" rows="3" class="form-control">{{ $profile->diagnosa }}</textarea>

                                        </div>

                                        <div class="form-group">
                                            <label for="room">Room:</label>
                                            <input type="text" id="room" name="room" class="form-control"
                                                value="{{ $profile->room }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="photos">Photo:</label>
                                            <input type="file" name="profile_image" class="form-control">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</body>


</html>
