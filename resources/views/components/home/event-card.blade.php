@props(['event'])
<div class="swiper-slide">
    <div class="postion-relative">
        <div class="event-style-2">
            <div class="card-items hover-up">
                <div class="d-flex flex-column flex-lg-row align-items-lg-center">
                    <div class="thumb-img position-relative mb-3 mb-lg-0">
                        <img class="rounded-2" src="{{asset($event->thumbnail)}}" alt="Blessed">
                        <div class="date fs-8 text-white d-flex flex-column justify-content-center position-absolute">
                            <h4 class="text-white mb-0 lh-0">{{ $event->start_date->format('d') }}</h4>
                            <span class="fs-8">{{ $event->start_date->format('F') }}</span>
                            <span>{{ $event->start_date->format('Y') }}</span>
                        </div>
                    </div>
                    <div class="titles ms-lg-4">
                        <div class="cat text-uppercase fs-8 mb-1">
                            <span>PROGRAM</span>
                        </div>
                        <h5 class="title fs-5 mb-3">
                            <a href="{{route('events.show', $event->slug)}}" class="fs-5 text-dark text-hover-primary font-body fw-normal">{{$event->title}}</a>
                        </h5>
                        <p class="time fs-8 mb-1">
                            <i class="size-12" data-feather="clock"></i>
                            <span>{{ $event->start_date->format('h:i A') }} to {{ $event->end_date->format('h:i A') }}</span>
                        </p>
                        <p class="location fs-8">
                            <i class="size-12" data-feather="map-pin"></i>
                            <span>{{$event->location}}</span>
                        </p>
                        <a href="{{route('events.show', $event->slug)}}" class="d-inline-flex rounded-5 tc-btn-xs fs-8">
                            <span>Read More</span>
                            <i data-feather="arrow-right" class="size-12"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
