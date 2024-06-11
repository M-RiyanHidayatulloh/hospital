@include('home.css')
@include('home.header')
<section class="about_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="img-box">
                    <img src="images/slide2.jpg" alt="About Rumah Sehat">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            Tentang Rumah <span>Sehat</span>
                        </h2>
                    </div>
                    <p>
                        Selamat datang di Rumah Sehat, tempat di mana kesehatan dan kenyamanan Anda adalah prioritas
                        utama kami. Sebagai penyedia layanan kesehatan terkemuka, kami berkomitmen untuk memberikan
                        perawatan medis berkualitas tinggi dengan pendekatan yang ramah dan personal.
                    </p>
                    <p id="more-text" style="display: none;">
                        Di Rumah Sehat, kami memahami pentingnya kesehatan yang optimal dan percaya bahwa setiap
                        individu berhak mendapatkan layanan kesehatan terbaik. Fasilitas kami dilengkapi dengan
                        teknologi medis terkini dan ditangani oleh tim profesional medis yang berpengalaman dan
                        berdedikasi.
                        <br><br>
                        Kami menawarkan berbagai layanan kesehatan yang komprehensif, termasuk konsultasi dengan dokter
                        ahli, layanan darurat yang siap melayani 24/7, serta berbagai layanan diagnostik dan
                        laboratorium. Selain itu, kami juga menyediakan informasi kesehatan terbaru dan tips hidup sehat
                        untuk membantu Anda dalam perjalanan menuju kesehatan yang lebih baik.
                        <br><br>
                        Komitmen kami adalah untuk selalu memberikan pelayanan yang unggul dan memastikan setiap pasien
                        merasa nyaman dan dihargai. Terima kasih telah mempercayakan kesehatan Anda kepada kami.
                    </p>
                    <a href="javascript:void(0);" onclick="toggleText()" id="read-more-btn">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="facility_section">
    <div class="container">
        <div class="heading_container">
            <h2>Fasilitas <span>Kami</span></h2>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="img-box">
                    <img src="images/fas1.jpg" alt="Fasilitas Rumah Sehat 1">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="img-box">
                    <img src="images/fas2.jpg" alt="Fasilitas Rumah Sehat 2">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="img-box">
                    <img src="images/fas3.jpg" alt="Fasilitas Rumah Sehat 3">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="img-box">
                    <img src="images/fas4.jpg" alt="Fasilitas Rumah Sehat 4">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="img-box">
                    <img src="images/fas5.jpg" alt="Fasilitas Rumah Sehat 5">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="img-box">
                    <img src="images/fas6.jpg" alt="Fasilitas Rumah Sehat 6">
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleText() {
        var moreText = document.getElementById("more-text");
        var readMoreBtn = document.getElementById("read-more-btn");
        if (moreText.style.display === "none") {
            moreText.style.display = "block";
            readMoreBtn.textContent = "Sebelumnya";
        } else {
            moreText.style.display = "none";
            readMoreBtn.textContent = "Selengkapnya";
        }
    }
</script>



@include('home.info')
@include('home.footer')
