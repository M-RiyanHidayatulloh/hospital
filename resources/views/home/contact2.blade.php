@include('home.css')
@include('home.header')

<section class="book_section layout_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col-lg-5">
                    <form>
                        <h4>CONTACT<span> US</span></h4>
                        <div class="form-row">
                            <div class="contact-item mb-3">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span class="contact-label">Call:</span>
                                <a href="tel:+018889999">+01 8889999</a>
                            </div>
                            <div class="contact-item mb-3">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span class="contact-label">Email:</span>
                                <a href="mailto:rumahsehat@gmail.com">rumahsehat@gmail.com</a>
                            </div>
                            <div class="contact-item mb-3">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span class="contact-label">Location:</span>
                                <a href="https://www.google.com/maps/place/Your+Location" target="_blank">1234 Street
                                    Name, City, Country</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.97085556146!2d110.33364484989751!3d-7.803248457431946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1718302969161!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@include('home.info')
@include('home.footer')
