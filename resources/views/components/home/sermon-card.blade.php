@props(['sermon'])
<div class="swiper-slide">
    <div class="postion-relative">
        <div class="project__item-four">
            <div class="project__thumb-four">
                <a href="{{ route('sermons.show', $sermon->slug) }}"><img
                        src="{{ getFile($sermon->thumbnail, 'sermon-placeholder.png') }}" alt="gum"></a>
            </div>
            <div class="project__content-four">
                <div class="left-content">
                    <h4 class="title text-white">
                        <a href="{{ route('sermons.show', $sermon->slug) }}">{{ $sermon->topic }}</a>
                    </h4>
                    <p class="fs-7 text-white des">
                        {{ $sermon->description }}
                    </p>
                    <span>Sermon By: {{ $sermon->preacher }}</span>
                </div>
                <div class="more-details d-flex gap-2 mt-4">
                    <div class="icons d-flex gap-2 align-items-center">
                        @if ($sermon->videp)
                            <a href="{{ $sermon->video }}" target="_blank" title="Watch Now"><i
                                    class="fab fa-youtube"></i></a>
                        @endif
                        @if ($sermon->audio)
                            <a href="javascript:void(0);"
                                onclick="openAudioPlayer('{{ asset('storage/' . $sermon->audio) }}', '{{ $sermon->topic }}')"
                                title="Listen Audio">
                                <i class="fas fa-headphones"></i>
                            </a>
                        @endif
                        <a href="javascript:void()" title="Download" download=""><i
                                class="fas fa-cloud-download-alt"></i></a>
                        @if ($sermon->pdf_file)
                            <a href="{{ $sermon->pdf_file }}" title="Download PDF" download><i
                                    class="far fa-file-pdf"></i></a>
                        @endif

                    </div>
                    <a href="{{ route('sermons.show', $sermon->slug) }}" class="btn d-flex gap-1 btn-rounded-1">
                        <span>View Details</span>
                        <i class="size-12" data-feather="arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
