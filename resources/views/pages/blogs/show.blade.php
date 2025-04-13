<x-app-layout :$pageName>
    <div class="envent-details-header">
        <div class="page-header" data-background="assets/images/home2/hero-2-bg.png"></div>
    </div>

    <!-- Blog Details
    ================= -->
    <section class="sermon-details-section-1">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 mb-4 d-flex justify-content-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-nowrap">
                            <li class="breadcrumb-item d-inline-flex"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item d-inline-flex"><a href="{{ route('blogs') }}">Blog</a></li>
                            <li class="breadcrumb-item  d-inline-flex active fw-semibold" aria-current="page">Blog
                                Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 gap-2 py-4 d-flex justify-content-center">
                    @foreach ($post->categories as $catergory)
                        <a class="btn-blur rounded-5 px-3 py-2" href="javascript:void">{{ $catergory?->name }}</a>
                    @endforeach
                </div>
                <div class="col-12 d-flex align-items-center flex-column justify-content-center">
                    <h1 class="text-center page-title fw-medium">Inspirations from the Pulpit: Reflections on Sunday
                        Sermons
                    </h1>
                </div>
                <div class="col-12 mt-5 d-flex justify-content-center">
                    <img class="rounded-4" src="{{ $post->featurePhoto }}" alt="gum">
                </div>
                <div class="col-10">
                    <div class="d-block d-md-flex underlined-bottom justify-content-between">
                        <div
                            class="position-relative w-fit-content overflow-hidden shine-animate-item hover-up d-flex align-items-center py-4">
                            {{--                            <a href="blog-details.html" class="shine-animate"> --}}
                            {{--                                <img src="assets/images/pastors/avatar-img-pastors-sec-4.png" alt="gum"> --}}
                            {{--                            </a> --}}
                            <div class="title ps-4">
                                <h3 class="fs-5 fw-semibold mb-0">
                                    <a href="javascript:void()">{{ $post->user->name }}</a>
                                </h3>
                                <p class="fs-7 mb-0">{{ $post->formattedPublishedDate() }}</p>
                            </div>
                        </div>
                        <div class="icons d-flex align-items-center mb-4 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0 mb-sm-4">
                            <p class="text-dark mb-0 me-2">Share:</p>
                            <a href="javascript:" target="_blank" class="fw-600 text-dark px-2"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="javascript:" target="_blank" class="fw-600 text-dark px-2"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="javascript:" target="_blank" class="fw-600 text-dark px-2"><i
                                    class="fab fa-pinterest-p"></i></a>
                            <a href="javascript:" target="_blank" class="fw-600 text-dark px-2"><i
                                    class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="row">{!! $post->body !!}</div>
                    {{--      next and prev   <x-nav-post />   --}}
                    {{--      next and prev   <x-post-comment />   --}}
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
