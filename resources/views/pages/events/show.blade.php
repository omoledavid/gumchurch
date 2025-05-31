<x-app-layout :$pageName>
    <x-banner :$pageName />
    <!-- Event Details Page
            ======================= -->
    <section class="event-details-section-1 pt-80">
        <div class="container container-1">
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('events')}}">Events</a></li>
                            <li class="breadcrumb-item active fw-semibold" aria-current="page">Event Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 mb-5 d-flex justify-content-center">
                    <h1 class="text-center page-title fw-medium">{{$event->title}}</h1>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <img src="{{asset($event->image)}}" alt="gum">
                </div>
            </div>
        </div>
    </section>

    <!-- Event Organizer Team
    ========================= -->
    <section class="pt-110px pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="Introduction">

                        <div class="row">
                            <div class="col-sm-8 col-12">
                                <h2 class="fw-medium pb-2">{{$event->title}}</h2>
                            </div>
                            <div class="col-sm-4 text-end d-none d-xxl-block d-lg-block d-md-block">
                                <a href="javascript:void()" class="btn text-white rounded-5 btn-circle-arrow menu-tigger" data-aos="flip-up">
                                    <span>Set Reminder</span>
                                    <span class="bg-transparent ms-2"><i class="size-16" data-feather="arrow-right"></i></span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

            </div>
            <div class="row">
                {!! $event->content !!}
            </div>
            {{-- @include('sections.home.testimonies') --}}
        </div>
    </section>
</x-app-layout>
