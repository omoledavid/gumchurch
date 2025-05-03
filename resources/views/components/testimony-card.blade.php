@props(['testimony'])
<div class="swiper-slide">
    <div class="testimonial-style-01 hover-up">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ getFile($testimony->image, 'avatar.png')}}" class="rounded-circle mb-3" alt="Avatar">
                <div>
                    <p class="fs-7">{{$testimony->testimony}}</p>
                    <p class="mb-0 fs-6 fw-semibold text-dark">- {{$testimony->name}} -</p>
                </div>
            </div>
        </div>
    </div>
</div>
