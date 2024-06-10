@include('home.css')
@include('home.header')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Janji Temu Pasien</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Janji Temu Pasien</h2>

    <!-- Informasi tentang klinik -->
    <div class="card">
      <div class="card-header">
        Tentang Klinik
      </div>
      <div class="card-body">
        <p>Klinik XYZ adalah tempat yang nyaman dan bersih untuk mendapatkan layanan kesehatan berkualitas. Tim medis kami terdiri dari dokter-dokter terbaik yang siap membantu Anda.</p>
        <p>Jl. Contoh No. 123, Kota Contoh</p>
        <p>Telepon: 123-456-789</p>
      </div>
    </div>

    <!-- Jadwal dokter -->
    <div class="card">
      <div class="card-header">
        Jadwal Dokter
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Nama Dokter</th>
              <th>Spesialisasi</th>
              <th>Jadwal Praktek</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Dokter A</td>
              <td>Spesialis A</td>
              <td>Senin - Jumat, 08:00 - 16:00</td>
            </tr>
            <tr>
              <td>Dokter B</td>
              <td>Spesialis B</td>
              <td>Senin - Sabtu, 09:00 - 17:00</td>
            </tr>
            <!-- Informasi jadwal dokter lainnya disini -->
          </tbody>
        </table>
      </div>
    </div>

    <!-- Kontak -->
    <div class="card">
      <div class="card-header">
        Hubungi Kami
      </div>
      <div class="card-body">
        <p>Jika Anda memiliki pertanyaan atau memerlukan bantuan, jangan ragu untuk menghubungi kami:</p>
        <p>Telepon: 123-456-789</p>
        <p>Email: info@klinikxyz.com</p>
      </div>
    </div>

    <!-- Form untuk memilih dokter dan waktu janji temu -->
    <div class="card">
      <div class="card-header">
        Pilih Dokter dan Waktu Janji Temu
      </div>
      <div class="card-body">
        <!-- Isi dengan formulir pemilihan dokter dan waktu -->
        <form>
          <div class="form-group">
            <label for="dokter">Dokter:</label>
            <select class="form-control" id="dokter">
              <option>Dokter A</option>
              <option>Dokter B</option>
              <option>Dokter C</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tanggal">Tanggal Janji Temu:</label>
            <input type="date" class="form-control" id="tanggal">
          </div>
          <button type="submit" class="btn btn-primary">Pilih Dokter & Tanggal</button>
        </form>
      </div>
    </div>

    <!-- Form untuk mengisi detail keluhan dan membuat janji temu -->
    <div class="card">
      <div class="card-header">
        Isi Detail Keluhan dan Buat Janji Temu
      </div>
      <div class="card-body">
        <!-- Isi dengan formulir detail keluhan dan membuat janji temu -->
        <form>
          <div class="form-group">
            <label for="keluhan">Keluhan:</label>
            <textarea class="form-control" id="keluhan" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Buat Janji Temu</button>
        </form>
      </div>
    </div>

    <!-- Daftar janji temu pasien -->
    <div class="card">
      <div class="card-header">
        Daftar Janji Temu Pasien
      </div>
      <div class="card-body">
        <!-- Isi dengan daftar janji temu pasien beserta statusnya -->
        <table class="table">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Dokter</th>
              <th>Keluhan</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>12 Mei 2024</td>
              <td>Dokter A</td>
              <td>Sakit kepala</td>
              <td>Belum Terkonfirmasi</td>
              <td>
                <button class="btn btn-sm btn-warning">Ubah</button>
                <button class="btn btn-sm btn-danger">Batal</button>
              </td>
            </tr>
            <!-- Data janji temu lainnya disini -->
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
