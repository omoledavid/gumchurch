@props(['post'])
<div class="d-flex align-items-center gap-4 blog-style-2 rounded-2 overflow-hidden shine-animate-item hover-up">
    <div class="thumnail position-relative overflow-hidden">
        <a href="{{route('post.show', $post->slug)}}" class="shine-animate">
            <div style="width: 100%; max-width: 152px; height: auto; aspect-ratio: 152 / 168; background: url('{{ asset($post->featurePhoto) }}') no-repeat center center; background-size: cover;"></div>
        </a>
    </div>
    <div class="card-body-1">
        <h5 class="font-body text-dark fs-5 lh-base mb-0"><a href="{{route('post.show', $post->slug)}}" class="">{{ $post->title }}</a></h5>
        <div class="meta-1 fs-6 mb-0">
            <span class="author">by <a href="{{route('post.show', $post->slug)}}" class="text-decoration-underline"> {{$post->user->name}}</a></span>
            <span class="date ms-1">{{$post->formattedPublishedDate()}}</span>
        </div>
    </div>
</div>
<style>
    @media (max-width: 768px) {
        div {
            max-width: 100%;
            height: auto;
            aspect-ratio: auto;
        }
    }
</style>
