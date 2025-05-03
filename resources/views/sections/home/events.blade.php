@if ($events && $events->count())
    <section class="home2-section2 pt-80px pb-80px position-relative" id="about">
        <div class="container">
            <div class="row mb-5 align-items-end">
                <div class="col-lg-8 col-md-8 col-sm-8 sub-title2">
                    <div class="d-flex gap-5 align-items-end">
                        <div class="section-title tg-heading-subheading animation-style3">
                            <span class="sub-title">Activities at God's Unification Mission</span>
                            <h5 class="title tg-element-title">Upcoming Events</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 d-xxl-block d-lg-block d-md-block d-sm-block d-none">
                    <div class="d-flex justify-content-end align-items-end">
                        <div class="swiper-button-prev swiper-button-prev-style-1 swiper-button-prev-animate">
                            <i class="size-24" data-feather="arrow-left"></i>
                        </div>
                        <div class="swiper-button-next swiper-button-next-style-1 swiper-button-next-animate">
                            <i class="size-24" data-feather="arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- swipper js -->
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 position-relative">
                    <div class="box-swiper-padding">
                        <div class="swiper-container blessed-event-slider">
                            <div class="swiper-wrapper py-2">
                                @foreach ($events as $event)
                                    <x-home.event-card :$event />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center my-2">
                    <div class="blessed-event-slider-pagination"></div>
                </div>
            </div>
        </div>
        <!-- end swipper js -->
        <div class="bg-bottom">
            <img src="{{ asset('assets/images/home2/img-bg-sec-2.png') }}" alt="gum" data-aos="fade-right"
                data-aos-delay="400" class="aos-init aos-animate img-bg">
        </div>
        <div class="bg-top d-none d-lg-block alltuchtopdown">
            <img src="{{ asset('assets/images/home2/img-bg-sec-2-1.png') }}" alt="gum" data-aos="fade-right"
                data-aos-delay="400" class="aos-init aos-animate img-bg">
        </div>
    </section>

@endif
