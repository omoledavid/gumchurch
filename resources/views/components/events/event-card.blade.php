@props(['event'])
<div class="col-lg-6">
    <div class="thumb">
        <a href="{{ route('events.show', $event->slug) }}">
            <div class="event-thumbnail"
                style="background: #eee url('{{ asset('storage/'.$event->thumbnail) }}') no-repeat center center; background-size: cover;">
            </div>

            {{--            <img width="579px" height="370px" class="rounded mt-sm-0 w-100" src="{{asset($event->thumbnail)}}" alt="gum" data-aos="fade-up"> --}}
        </a>
    </div>
    <div class="position-relative mb-5 d-flex justify-content-center event-card-1 hover-up">
        <div class="content-event rounded">
            <h4 class="mt-4 fw-medium"><a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a></h4>
            <p class="content-p pb-4" data-aos="fade-up">
                {{ Str::words($event->description, 15, '....') }}
            </p>
            <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between">
                <div class="times">
                    <p class="time fs-8 mb-1">
                        <i class="size-12" data-feather="clock"></i>
                        <span>{{ $event->start_date->format('h:i A') }} - {{ $event->end_date->format('h:i A') }}</span>
                    </p>
                    <p class="location fs-8">
                        <i class="size-12" data-feather="map-pin"></i>
                        <span>{{ $event->location }}</span>
                    </p>
                </div>
                <div class="button">
                    <a href="{{ route('events.show', $event->slug) }}"
                        class="d-inline-flex rounded-5 tc-btn-md fs-8 text-center">
                        <span>View Details</span>
                        <i data-feather="arrow-right" class="size-12"></i>
                    </a>
                </div>
                <div class="date fs-8 text-white d-flex flex-column justify-content-center position-absolute">
                    <h4 class="text-white mb-0 lh-0">{{ $event->start_date->format('d') }}</h4>
                    <span class="fs-8">{{ $event->start_date->format('F') }}</span>
                    <span>{{ $event->start_date->format('Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .event-thumbnail {
        height: 300px;
        width: 100%;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .event-thumbnail {
            height: 200px;
            /* Reduce height for mobile */
        }
    }
</style>
