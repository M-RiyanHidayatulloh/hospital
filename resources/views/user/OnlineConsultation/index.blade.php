    @include('home.css')
    @include('home.header')

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .left-section {
            border-right: 1px solid #ddd;
        }

        .doctor-card {
            height: 200px;
        }
    </style>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 left-section">
                <h2 class="mb-4">Ketentuan Konsultasi Online</h2>
                <p>Silakan baca ketentuan berikut sebelum memulai konsultasi online:</p>
                <ul>
                    <li>Konsultasi dilakukan melalui WhatsApp.</li>
                    <li>Pastikan Anda memiliki koneksi internet yang stabil.</li>
                    <li>Waktu konsultasi dibatasi sesuai jadwal yang telah ditentukan oleh dokter.</li>
                    <li>Biaya konsultasi dapat berbeda tergantung pada dokter yang Anda pilih.</li>
                    <li>Pastikan untuk memberikan informasi yang jelas dan lengkap kepada dokter.</li>
                </ul>
                <p>Dengan memulai konsultasi, Anda menyetujui semua ketentuan di atas.</p>
            </div>
            <div class="col-md-8">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h2 class="mb-3 text-center text-md-start"></h2>
                    <div class="input-group w-50">
                        <input type="text" class="form-control" placeholder="Cari spesialis...">
                        <button class="btn btn-primary" type="button">Cari</button>
                    </div>
                </div>
                <div class="row" style="max-height: 400px; overflow-y: auto;">
                    @foreach($doctors as $doctor)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm h-100 doctor-card" onclick="focusCard(this)">
                                <img src="{{ asset($doctor->profile_image) }}" class="card-img-top" alt="{{ $doctor->name }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $doctor->name }}</h5>
                                    <p class="card-text">{{ $doctor->specialization }}</p>
                                    <p class="card-text mt-auto">
                                        {{-- <span class="badge {{ $doctor->status == 'online' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ ucfirst($doctor->status) }}
                                        </span> --}}
                                    </p>
                                    <a href="https://wa.me/{{ $doctor->phone }}" class="btn btn-primary mt-2" target="_blank">Chat WA</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

@include('home.info')
@include('home.footer')
