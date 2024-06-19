<section class="team_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>Doctors</span>
            </h2>
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel team_carousel">
                @foreach ($doctor as $doctors)
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('/storage/' . $doctors->profile_image) }}" alt="" />
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $doctors->name }}
                                </h5>
                                <h6>
                                    {{ $doctors->specialization }}
                                </h6>
                                <div class="social_box">
                                    <a href="">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
