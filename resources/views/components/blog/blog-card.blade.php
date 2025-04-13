@props(['post'])
<div class="col-lg-4 col-md-6 mb-5">
    <div class="card-blog-1 rounded-2 overflow-hidden bg-white shadow-1 shine-animate-item hover-up">
        <div class="position-relative overflow-hidden mb-2">
            <a href="{{route('post.show', $post->slug)}}" class="shine-animate">
                <div class="blog-image-gum" style="height: 246px; background: url('{{ asset($post->featurePhoto) }}') no-repeat center center; background-size: cover;"></div>
            </a>
        </div>
        <div class="card-body p-4">
            <h5 class="font-body text-dark fs-5 lh-base"><a href="{{route('post.show', $post->slug)}}"
                    class="">{{ $post->title }}</a></h5>
            <div class="meta-1 fs-7 mb-3">
                <span class="author">by <a href="javascript:" class="text-decoration-underline">
                    {{$post->user->name}}</a></span>
                <span class="date ms-1">{{$post->formattedPublishedDate()}}</span>
            </div>
            <p class="fs-7 mb-4 text-dark">{{ Str::words($post->sub_title, 15, '....') }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="view">
                    <i class="size-14" data-feather="eye"></i>
                    <span class="text-dark fs-7">27 views</span>
                </div>
                <a href="{{route('post.show', $post->slug)}}" class="text-decoration-underline fs-7">Read More</a>
            </div>
        </div>
    </div>
</div>
<style>
    @media (max-width: 768px) {
        .blog-image-gum {
            max-width: 100%;
            height: auto;
            aspect-ratio: auto;
        }
    }
</style>