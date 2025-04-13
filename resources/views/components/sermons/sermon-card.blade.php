@props(['sermon'])
<div class="col-lg-6">
    <div class="card-sermon-1 rounded-2 overflow-hidden bg-white shine-animate-item hover-up mb-4">
        <div class="position-relative overflow-hidden mb-2">
            <a href="{{ route('sermons.show', $sermon->slug) }}" class="shine-animate">
                <div style="background: url('{{ getFile($sermon->thumbnail, 'sermon-placeholder.png') }}') no-repeat center center; background-size: cover; height: 325px; width: 577px; border-radius: 8px;"
                    class="responsive-image">
                </div>
            </a>
        </div>
        <div class="card-body p-4">
            <h3 class="font-body text-dark fs-3 lh-base"><a href="{{ route('sermons.show', $sermon->slug) }}"
                    class="">{{ $sermon->topic }}</a></h3>
            <div class="meta-1 fs-7 mb-3">
                <span class="author">Sermon By: <a href="{{ route('sermons.show', $sermon->slug) }}"
                        class="text-decoration-underline"> {{ $sermon->preacher }}</a></span>
            </div>
            <p class="fs-7 mb-4 text-dark">{{ Str::words($sermon->description, 15, '...') }}</p>
            <div class="d-flex justify-content-between">
                <div class="icons d-flex gap-2 align-items-center">
                    @if ($sermon->video)
                        <a href="{{ $sermon->videp }}" target="_blank" title="Watch Now"><i
                                class="fab fa-youtube"></i></a>
                    @endif
                    @if ($sermon->audio)
                        <a href="javascript:void(0);"
                            onclick="openAudioPlayer('{{ asset('storage/' . $sermon->audio) }}', '{{ $sermon->topic }}')"
                            title="Listen Audio">
                            <i class="fas fa-headphones"></i>
                        </a>
                    @endif
                    @if ($sermon->pdf_file)
                        <a href="javascript:void()" title="Download" download=""><i
                                class="fas fa-cloud-download-alt"></i></a>
                    @endif
                    <a href="javascript:void()" title="Download PDF" download><i class="far fa-file-pdf"></i></a>
                </div>
                <a href="{{ route('sermons.show', $sermon->slug) }}"
                    class="d-inline-flex btn-outline rounded-5 tc-btn-md fs-7 gap-2">
                    <span>Read More</span>
                    <i data-feather="arrow-right" class="size-14"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<style>
    .responsive-image {
        width: 100%;
        height: auto;
        max-width: 577px;
        max-height: 325px;
    }
</style>
