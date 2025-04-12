@if($testimonies)
    <section class="position-relative section-padding home2-section9">
        <div class="container">

            <div class="row mb-2 align-items-end">
                <div class="col-lg-8 col-md-8 col-sm-8 sub-title2">
                    <div class="d-flex gap-5 align-items-end">
                        <div class="section-title tg-heading-subheading animation-style3">
                            <span class="sub-title">Real Stories, Real Impact</span>
                            <h5 class="title tg-element-title">Stories of growth, hope, and inspiration from our
                                community.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 d-xxl-block d-lg-block d-md-block d-sm-block d-none">
                    <div class="d-flex justify-content-end align-items-end">
                        <div class="swiper-button-prev swiper-button-prev-style-1 swiper-button-prev-3">
                            <i class="size-24" data-feather="arrow-left"></i>
                        </div>
                        <div class="swiper-button-next swiper-button-next-style-1 swiper-button-next-3">
                            <i class="size-24" data-feather="arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pastor-sliders">
                <div class="box-swiper">
                    <div class="swiper-container blessed-testimonial-slider">
                        <div class="swiper-wrapper pt-5 pb-5">
                            @foreach($testimonies as $testimony)
                                <x-testimony-card :$testimony/>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <div class="blessed-testimonial-slider-pagination"></div>
                </div>

            </div>
        </div>
        <div class="wrap-asset position-absolute top-100px end-0 me-5">
            <img class="alltuchtopdown" src="{{asset('assets/images/home2/img-bg-sec-9.png')}}" alt="gum">
        </div>
    </section>
@endif
