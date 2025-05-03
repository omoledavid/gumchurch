<section class="section-6 position-relative mt-4">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 pe-lg-4">
                <div class="position-relative">
                    <div class="background">
                        <img src="{{ asset('gum/images/about us.png') }}" alt="gum" data-aos="fade-zoom-in">
                    </div>
                    <div class="card-float position-absolute br-4 alltuchtopdown">
                        <div class="card-float-top rounded-top-1">
                            <img class="mb-2" src="{{ asset('assets/images/home1/book-card-sec6.png') }}"
                                alt="gum" data-aos="fade-up">
                            <p class="mb-0 pt-2 fs-7 text-dark">Reach out to us for support, counseling, or prayer.</p>
                        </div>
                        <div class="rounded-bottom-1 card-float-bot d-flex align-items-center justify-content-center">
                            <p class="text-white mb-0">Start Your Journey</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-content-start flex-wrap pt-lg-0 pt-5 ps-lg-4">
                <div class="d-flex gap-5 align-items-end" data-aos="fade-up">
                    <div class="section-title">
                        <span class="sub-title">Embrace Tranquility</span>
                    </div>
                </div>
                <h2 class="fw-normal ds-5" data-aos="fade-up">Discover the Transformative Strength of Collective
                    Worship</h2>
                <p class="fs-6" data-aos="fade-up">
                    Be a part of our congregation for uplifting services enriched with music, prayer, and moments of
                    spiritual reflection. Get involved in our lively community by volunteering for committees, joining
                    social events, or contributing your talents to our worship experiences.
                </p>
                <a href="tel:{{ formatPhoneNumber($general->site_phone) ?? '' }}" class="pt-2 d-flex align-items-center"
                    data-aos="flip-up">
                    <span class="icon text-white me-4">
                        <i class="size-26" data-feather="users"></i>
                    </span>
                    <div class="contact">
                        <p class="fw-light fs-6 mb-2">Do you have any question?</p>
                        <p class="fs-3 mb-0 phone-num">{{ formatPhoneNumber($general->site_phone) ?? '' }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="wrap-asset position-absolute">
        <img src="{{ asset('assets/images/home1/img-sec-6.png') }}" alt="gum"
            data-parallax='{"x" : 100 , "y" : -200 }'>
    </div>
</section>
