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
        height: 300px;
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
                <h2 class="mb-3 text-center text-md-start">Cari Dokter</h2>
                <div class="input-group w-50">
                    <input type="text" class="form-control" id="search-input" placeholder="Search...">
                    <button class="btn btn-primary" id="search-button">Search</button>
                </div>
            </div>
            <div class="row" id="doctor-cards-container" style="max-height: 400px; overflow-y: auto;">
                @foreach ($doctor as $item)
                    <div class="col-md-4 mb-4 doctor-card-container">
                        <div class="card shadow-sm h-100 doctor-card">
                            <img src="{{ asset('storage/profile-image/' . $item->profile_image) }}" alt="" />
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title doctor-name">{{ $item->name }}</h5>
                                <p class="card-text doctor-specialist">{{ $item->specialist }}</p>
                                <button class="btn btn-primary mt-auto open-form-button" data-doctor-id="{{ $item->id }}" data-toggle="modal" data-target="#consultationFormModal{{ $item->id }}">Consult</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div id="no-results" style="display: none; text-align: center; margin: auto">
    <p>No doctors found.</p>
</div>

<!-- Modal -->
@foreach ($doctor as $item)
<div class="modal fade" id="consultationFormModal{{ $item->id }}" tabindex="-1" aria-labelledby="consultationFormModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="consultationFormModalLabel{{ $item->id }}">Consultation Form</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store-online-consultations') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $item->id }}">
                    <div class="mb-3">
                        <label for="patientName" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="patientName" value="{{ Auth::user()->name }}" readonly name="patientName">
                    </div>
                    <div class="mb-3">
                        <label for="patientEmail" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="patientEmail" name="patientEmail" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="patientPhone" class="form-label">Your Phone</label>
                        <input type="tel" class="form-control" id="patientPhone" name="patientPhone" value="{{ Auth::user()->phone }}" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Proceed to Konsultasi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        function filterDoctors() {
            var searchValue = $('#search-input').val().toLowerCase();
            var hasResults = false;
            $('.doctor-card-container').each(function() {
                var doctorName = $(this).find('.doctor-name').text().toLowerCase();
                var doctorSpecialization = $(this).find('.doctor-specialization').text().toLowerCase();
                if (doctorName.includes(searchValue) || doctorSpecialization.includes(searchValue)) {
                    $(this).show();
                    hasResults = true;
                } else {
                    $(this).hide();
                }
            });

            if (!hasResults) {
                $('#no-results').show();
            } else {
                $('#no-results').hide();
            }
        }

        $('#search-button').on('click', filterDoctors);

        $('#search-input').on('keyup', function(event) {
            if (event.key === 'Enter') {
                filterDoctors();
            }
        });

        $('.open-form-button').on('click', function() {
            var doctorId = $(this).data('doctor-id');
            $('#consultationFormModal' + doctorId).modal('show');
        });


        $('form').on('submit', function(event) {
            event.preventDefault();
            var form = $(this);
            var paymentUrl = "{{ route('payment.form') }}";

            var formData = form.serialize();
            var fullPaymentUrl = paymentUrl + "?" + formData;

            window.location.href = fullPaymentUrl;
        });
    });
</script>

@include('home.info')
@include('home.footer')
