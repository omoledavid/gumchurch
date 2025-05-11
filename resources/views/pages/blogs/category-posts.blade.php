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
                               class="btn rounded-5 btn-tag-outline {{ $posts->contains(fn($post) => $post->categories->contains('slug', $category->slug)) ? 'active' : '' }}">
                                <span>{{ $category->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
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
