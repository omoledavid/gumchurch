@if($sermons)
    <section class="home1-section3 position-relative" id="sermons-section">
        <div class="container">
            <div class="row mb-5 align-items-end d-flex align-items-center">
                <div class="col-lg-10 col-md-8 mb-3 mb-lg-0">
                    <div class="d-flex flex-column flex-xl-row gap-xl-5 align-items-xl-end">
                        <div class="section-title tg-heading-subheading animation-style3">
                            <span class="sub-title">Divine Wisdom</span>
                            <h5 class="title tg-element-title">Explore Our Sermons</h5>
                        </div>
                        <p class="fs-5 w-lg-50 mb-0">
                            Explore the Essence of Spiritual Understanding through Our Engaging Sermons
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 d-none d-md-block">
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
            <div class="row align-items-center">
                <div class="col-12 position-relative">
                    <div class="box-swiper-padding">
                        <div class="swiper-container blessed-sermon-slider-one">
                            <div class="swiper-wrapper">
                                @foreach($sermons as $sermon)
                                    <x-home.sermon-card :$sermon/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt-3">
                    <div class="blessed-sermon-slider-one-pagination"></div>
                </div>
            </div>
        </div>
        <div class="wrap-asset position-absolute top-50 left-5 ms-5">
            <img class="alltuchtopdown" src="{{asset('assets/images/sermon-details/cornflower-bgr.png')}}" alt="gum">
        </div>
    </section>
@endif
