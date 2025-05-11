<x-app-layout :$pageName>
    <x-banner :$pageName />
    <!-- Blog Post List
            =================== -->
    <section class="pt-110px ">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="w-75">
                        <h2 class="fw-normal mb-4">
                            Exploring Faith, Inspiring<br> Hearts: Insights from Our Blog
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        @foreach ($categories as $category)
                            <a href="{{ route('category.posts', $category->slug) }}" 
                               class="btn rounded-5 btn-tag-outline {{ collect($mainPost->categories)->contains('slug', $category->slug) ? 'active' : '' }}">
                                <span>{{ $category->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($mainPost)
                    <div class="col-md-12 mb-5">
                        <div class="campaign-style-1 hover-up position-relative">
                            <div class="card-items overflow-hidden shine-animate-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-12">
                                        <div class="mt-lg-0 thumb-img position-relative shine-animate">
                                            <a href="{{ route('post.show', $mainPost->slug) }}"
                                                class="text-dark text-hover-primary fw-semibold">
                                                <img class="rounded-2" src="{{ asset($mainPost->featurePhoto) }}"
                                                    alt="gum">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="mt-lg-0 mt-4 titles">
                                            <div class="d-flex gap-2 mb-3">
                                                @foreach ($mainPost->categories as $catergory)
                                                    <a href="javascript:"
                                                        class="d-inline-flex rounded-5 tc-btn-xs fs-8 btn-tag">
                                                        <span>{{ $catergory?->name }}</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                            <h3 class="title mb-3">
                                                <a href="{{ route('post.show', $mainPost->slug) }}"
                                                    class="text-dark text-hover-primary fw-semibold">{{ $mainPost->title }}</a>
                                            </h3>
                                            <div class="meta-1 fs-7 mb-3">
                                                <span class="author">by <a
                                                        href="{{ route('post.show', $mainPost->slug) }}"
                                                        class="text-decoration-underline">
                                                        {{ $mainPost->user->name }}</a></span>
                                                <span class="date ms-1">{{ $mainPost->formattedPublishedDate() }}</span>
                                            </div>
                                            <p class="fs-6 mb-4">
                                                {{ Str::words($mainPost->sub_title, 15, '....') }}
                                            </p>
                                            <a href="{{ route('post.show', $mainPost->slug) }}"
                                                class="d-inline-flex rounded-5 btn tc-btn-lg fs-8">
                                                <span class="me-1">Read More</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-arrow-right size-12">
                                                    <line x1="5" y1="12" x2="19" y2="12">
                                                    </line>
                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img class="position-absolute top-0 right-30px tag z-3" src="assets/images/home1/img-4.png"
                                alt="gum">
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            No posts available right now. Please check back later.
                        </div>
                    </div>
                @endif
                @if ($posts && $posts->count())
                    @foreach ($posts as $post)
                        <x-blog.blog-card :$post />
                    @endforeach
                    @if ($post->count() > 5)
                        <div class="col-12 d-flex justify-content-lg-start justify-content-center mt-5">
                            <nav aria-label="Page navigation example">
                                {{ $post->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>
</x-app-layout>
