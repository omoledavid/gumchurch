<x-app-layout :$pageName>
    <!-- Page Breadcrumps
           ===================== -->
    <div class="envent-details-header">
        <div class="page-header" data-background="assets/images/home2/hero-2-bg.png">
        </div>
    </div>
    <!-- Sermon Details
            =================== -->
    <section class="sermon-details-section-1">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('sermons') }}">Sermon</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sermons Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 d-flex align-items-center flex-column justify-content-center ">
                    <h1 class="text-center page-title fw-medium">{{ $sermon->topic }}</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="position-relative mb-4">
                        <div class="thumb rounded">
                            <div class="box-swiper">
                                <div class="swiper-container swiper-1-items">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img class="rounded-4 img-fluid w-100" height="37.375rem"
                                                src="{{ getFile($sermon->image, 'sermon-image-placeholder.png') }}"
                                                alt="Blessed" data-aos="fade-up">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-event rounded-4 z-2">
                            <div
                                class="content-event-item d-lg-flex d-block  align-items-center justify-content-between rounded-4 mb-5  p-4">
                                <div class="times d-flex flex-column justify-content-start mb-4 mb-lg-0">
                                    <p class="time fs-8 mb-3">
                                        <i class="size-16 me-2" data-feather="user"></i>
                                        <span class="text-300">Sermon By:</span>
                                        <span class="text-dark"> {{ $sermon->preacher }}</span>
                                    </p>
                                    <p class="time fs-8 mb-3">
                                        <i class="size-16 me-2" data-feather="clock"></i>
                                        <span class="text-300">Date:</span>
                                        <span class="text-dark">{{ $sermon?->date_preached?->format('d F Y') }}</span>
                                    </p>
                                    <p class="location  mb-0 fs-8">
                                        <i class="size-16 me-2" data-feather="map-pin"></i>
                                        <span class="text-300">Series:</span>
                                        <span class="text-dark">{{ $sermon->series->name }}</span>
                                    </p>
                                </div>
                                <div class="hr-vertical"></div>
                                <div class="icons d-flex gap-2 flex-column mb-4 mb-lg-0">
                                    @if ($sermon->video)
                                        <div class="items gap-2 d-flex align-items-center">
                                            <a href="javascript:void(0);">
                                                <i class="me-2 fab fa-youtube"></i>
                                                Watch Video
                                            </a>
                                        </div>
                                    @endif
                                    @if ($sermon->audio)
                                        <div class="items gap-2 d-flex align-items-center">
                                            <a href="javascript:void(0);"
                                                onclick="openAudioPlayer('{{getFile($sermon->audio) }}', '{{ $sermon->topic }}')"
                                                title="Listen Audio">
                                                <i class="fas fa-headphones"></i>
                                                Listen Audio
                                            </a>
                                        </div>
                                    @endif
                                    @if ($sermon->pdf_file)
                                        <div class="items gap-2 d-flex align-items-center">
                                            <a href="javascript:">
                                                <i class="me-2 far fa-file-pdf"></i>
                                            </a>
                                            <p class="fs-6 text-dark mb-0">View PDF files</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="hr-vertical"></div>
                                <a href="javascript:" class="btn text-white rounded-5 btn-circle-arrow my-auto"
                                    data-aos="flip-up">
                                    @if (!$sermon->video)
                                        <span>Watch Online</span>
                                    @else
                                        <span>
                                            <a href="javascript:void(0);"
                                                onclick="openAudioPlayer('{{getFile($sermon->audio) }}', '{{ $sermon->topic }}')"
                                                title="Listen Audio"> Play Online
                                            </a>
                                        </span>
                                    @endif
                                    <span class="bg-transparent ms-2">
                                        <i class="size-14" data-feather="arrow-right"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="row">
                                {!! $sermon->body !!}
                            </div>
                            <div class="cycles d-flex justify-content-end">
                                <div class="p-5 py-2 cycle d-flex align-items-center flex-column">
                                    <p class="fs-5 text-dark">- {{ $sermon->preacher }} -</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sermon Carousel
            ==================== -->
    @if ($otherSermons->count())
        <section class="home1-section3 position-relative" id="about">
            <div class="container">
                <div class="row mb-5 align-items-end">
                    <div class="col-lg-8 col-md-8 col-sm-8 sub-title2">
                        <div class="d-flex gap-5 align-items-end">
                            <div class="section-title tg-heading-subheading animation-style3">
                                <span class="sub-title">Sacred Teachings</span>
                                <h5 class="title tg-element-title">Explore Other Sermons</h5>
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
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12 position-relative">
                        <div class="box-swiper-padding">
                            <div class="swiper-container blessed-sermon-slider-two">
                                <div class="swiper-wrapper">
                                    @foreach ($otherSermons as $sermon)
                                        <x-home.sermon-card :$sermon />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <div class="blessed-sermon-slider-two-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="wrap-asset position-absolute top-50 left-5 ms-5">
                <img class="alltuchtopdown" src="assets/images/sermon-details/cornflower-bgr.png" alt="Blessed">
            </div>
        </section>
    @endif
</x-app-layout>
