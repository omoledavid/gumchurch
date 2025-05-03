<x-app-layout :$pageName>
    <x-banner :$pageName />
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('midnight-prayers') }}"
                        class="text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i>Back to all prayers
                    </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $sermon->title }}</li>
            </ol>
        </nav>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="card-title h3 mb-2">{{ $sermon->title }}</h1>
                <p class="text-muted mb-4">
                    <i class="bi bi-calendar-event me-1"></i>
                    {{ $sermon->recording_date->format('F j, Y') }}
                </p>

                @if ($sermon->description)
                    <div class="mb-4">
                        <h2 class="h5 fw-bold mb-2">Description</h2>
                        <p class="card-text">{{ $sermon->description }}</p>
                    </div>
                @endif

                <div class="mb-4">
                    <div class="card bg-light">
                        <div class="card-body">
                            <audio id="sermon-audio" class="w-100" controls preload="metadata">
                                <source src="{{ route('midnight-prayer.play', $sermon->id) }}"
                                    type="audio/{{ strtolower(str_replace('M4A', 'mp4', $sermon->file_type)) }}">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                </div>

                @if (isset($sermon->chapter_markers) && is_array($sermon->chapter_markers) && count($sermon->chapter_markers) > 0)
                    <div class="mb-4">
                        <h2 class="h5 fw-bold mb-3">Chapters</h2>
                        <div class="row g-3">
                            @foreach ($sermon->chapter_markers as $index => $chapter)
                                <div class="col-md-6 col-lg-4">
                                    <button class="chapter-marker btn btn-outline-secondary w-100 text-start"
                                        data-time="{{ $chapter['time'] }}">
                                        <span class="fw-medium">{{ $chapter['title'] }}</span>
                                        <span
                                            class="text-muted d-block small">{{ gmdate('H:i:s', $chapter['time']) }}</span>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        <i class="bi bi-clock me-1"></i>
                        Duration: {{ gmdate('H:i:s', $sermon->duration * 60) }}
                    </div>
                    <a href="{{ route('midnight-prayer.download', $sermon->id) }}" class="btn btn-primary">
                        <i class="bi bi-download me-1"></i>
                        Download
                        ({{ $sermon->file_size ? number_format($sermon->file_size / (1024 * 1024), 2) . ' MB' : 'Unknown size' }})
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <style>
            /* Custom styles for audio player */
            audio {
                width: 100%;
                border-radius: 0.25rem;
            }

            audio:focus {
                outline: 3px solid #0d6efd;
            }

            .chapter-marker:focus {
                box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            }

            /* High contrast mode support */
            @media (forced-colors: active) {
                .btn-outline-secondary {
                    border: 2px solid ButtonText;
                }

                .btn-primary {
                    border: 2px solid ButtonText;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const audio = document.getElementById('sermon-audio');
                const chapterMarkers = document.querySelectorAll('.chapter-marker');

                // Add event listeners to chapter markers
                chapterMarkers.forEach(marker => {
                    marker.addEventListener('click', function() {
                        const time = parseFloat(this.getAttribute('data-time'));
                        audio.currentTime = time;
                        audio.play();
                    });
                });

                // Add keyboard shortcuts for accessibility
                document.addEventListener('keydown', function(e) {
                    if (document.activeElement === audio) {
                        // Space bar to play/pause
                        if (e.code === 'Space') {
                            e.preventDefault();
                            if (audio.paused) {
                                audio.play();
                            } else {
                                audio.pause();
                            }
                        }

                        // Arrow right to forward 10 seconds
                        if (e.code === 'ArrowRight') {
                            audio.currentTime += 10;
                        }

                        // Arrow left to rewind 10 seconds
                        if (e.code === 'ArrowLeft') {
                            audio.currentTime -= 10;
                        }
                    }
                });

                // Add audio time tracking for chapter highlighting
                audio.addEventListener('timeupdate', function() {
                    const currentTime = audio.currentTime;

                    chapterMarkers.forEach(marker => {
                        const markerTime = parseFloat(marker.getAttribute('data-time'));
                        let nextMarkerTime = null;

                        // Find the next marker time
                        chapterMarkers.forEach(m => {
                            const t = parseFloat(m.getAttribute('data-time'));
                            if (t > markerTime && (nextMarkerTime === null || t <
                                    nextMarkerTime)) {
                                nextMarkerTime = t;
                            }
                        });

                        if (currentTime >= markerTime && (nextMarkerTime === null || currentTime <
                                nextMarkerTime)) {
                            marker.classList.remove('btn-outline-secondary');
                            marker.classList.add('btn-secondary');
                        } else {
                            marker.classList.remove('btn-secondary');
                            marker.classList.add('btn-outline-secondary');
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
