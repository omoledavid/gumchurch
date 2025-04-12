@props(['event'])
<div class="swiper-slide">
    <div class="d-flex fs-7 fw-normal align-items-center justify-content-md-center justify-content-lg-start mb-md-2 mb-lg-0">
        <span class="me-2 has-dot"><strong>UP COMING:</strong> {{$event->title}}</span>
        <a href="{{route('events.show', $event->slug)}}" class="d-flex rounded-5 tc-btn-xs">
            <span>Read More</span>
            <i data-feather="arrow-right" class="size-12"></i>
        </a>
    </div>
</div>
