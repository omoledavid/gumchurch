@if($mainPost)
    <section class="home-2-section-10 pt-80px pb-80px">
        <div class="container">
            <div class="row">
                <div class="section-title pb-5 tg-heading-subheading animation-style3">
                    <p class="sub-title fs-5">Our news and blog</p>
                    <h5 class="title tg-element-title ds-5 fw-normal">Updated Insights</h5>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card blog-style-1 shine-animate-item hover-up">
                        <div class="thumbnail shine-animate">
                            <a href="{{route('post.show', $mainPost->slug)}}">
                                <img src="{{ asset($mainPost->featurePhoto) }}" alt="gum">
                            </a>
                        </div>
                        <div class="card-body start-0 z-2">
                            <h5 class="card-title font-body text-dark fs-3 lh-base">
                                <a href="{{route('post.show', $mainPost->slug)}}">{{ $mainPost->title }}</a>
                            </h5>
                            <div class="meta-1 fs-5 mb-3">
                                <span class="author">by <a href="{{route('post.show', $mainPost->slug)}}" class="text-decoration-underline"> {{$mainPost->user->name}}</a></span>
                                <span class="date ms-1">{{$mainPost->formattedPublishedDate()}}</span>
                            </div>
                            <p class="card-text fs-6 mb-4 text-dark">{{ Str::words($mainPost->sub_title, 15, '....') }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="view">
                                    <i class="size-22" data-feather="eye"></i>
                                    <span class="text-dark fs-6">27 views</span>
                                </div>
                                <a href="{{route('post.show', $mainPost->slug)}}" class="text-decoration-underline fs-6">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-5 mt-lg-0">
                    <div class="blog-list">
                        @foreach($posts as $post)
                            <x-home.blog-card :$post/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
