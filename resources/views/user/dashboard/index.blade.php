@include('home.css')
@include('home.header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pasien</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-card {
          background-color: #f8f9fa;
          border: 1px solid #dee2e6;
          border-radius: 8px;
          padding: 20px;
          margin-bottom: 20px;
        }
        .profile-img {
          max-width: 100%;
          height: auto;
          border-radius: 8px;
        }
      </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Profil Pasien</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-card">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @php($profile_image = auth()->user()->profile_image)
                        <img src="{{ asset("storage/profile-image/$profile_image") }}" alt="">
                    <h5 class="mb-3">Informasi Pasien</h5>
                    <ul class="list-unstyled">
                        <li><strong>Nama:</strong> {{ Auth::user()->name }}</li>
                        <li><strong>year of birth:</strong>{{ Auth::user()->date_of_birth }}</li>
                        <li><strong>Phone Number:</strong> {{ Auth::user()->phone }}</li>
                        <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                        <li><strong>Address:</strong> {{ Auth::user()->address }}</li>
                    </ul>
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#editProfileModal">Ubah
                        profile</button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-card">
                    <h5 class="mb-3">Riwayat Medis</h5>
                    <ul class="list-unstyled">
                        <li><strong>Penyakit Kronis:</strong> [Jika ada]</li>
                        <li><strong>Alergi:</strong> [Jika ada]</li>
                        <li><strong>Operasi Terakhir:</strong> [Jika ada]</li>
                        <li><strong>Riwayat Penyakit Keluarga:</strong> [Jika ada]</li>
                    </ul>
                </div>
                <div class="profile-card">
                    <h5 class="mb-3">Catatan Kesehatan Terkini</h5>
                    <p>[Catatan kesehatan terkini dokter]</p>
                </div>
                <div class="profile-card">
                    <h5 class="mb-3">Catatan Konsultasi</h5>
                    <p>[Catatan konsultasi sebelumnya]</p>
                </div>
                <div class="profile-card">
                    <h5 class="mb-3">Resep Terakhir</h5>
                    <p>[Resep obat terakhir]</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
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
                    <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">

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
                            <label for="date_of_birth">year of birth:</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control"
                                value="{{ $profile->date_of_birth}}">
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
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control"
                                value="">
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


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
