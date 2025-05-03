<x-app-layout :$pageName>
    <x-banner :$pageName />
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 mb-0">{{ $pageName }}</h1>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 col-lg-4">
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="date" id="sermon-search" class="form-control" placeholder="Search prayers...">
                </div>
            </div>
        </div>

        <div class="row g-4" id="sermon-container">
            @forelse($sermons as $sermon)
                <div class="col-md-6 col-lg-4 sermon-card">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h2 class="h5 card-title mb-2">{{ $sermon->title }}</h2>
                            <p class="text-muted mb-3">
                                <i class="bi bi-calendar-event me-1"></i>
                                {{ $sermon->recording_date->format('F j, Y') }}
                            </p>
                            <p class="text-muted mb-3">
                                <i class="bi bi-clock me-1"></i>
                                Duration: {{ gmdate('H:i:s', $sermon->duration * 60) }}
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0 pt-0">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('midnight-prayer.show', $sermon->id) }}" class="btn btn-primary">
                                    <i class="bi bi-play-fill me-1"></i> Play
                                </a>
                                <a href="{{ route('midnight-prayer.download', $sermon->id) }}"
                                    class="btn btn-outline-secondary">
                                    <i class="bi bi-download me-1"></i> Download
                                    <span class="d-none d-sm-inline">
                                        ({{ $sermon->file_size ? number_format($sermon->file_size / (1024 * 1024), 2) . ' MB' : 'Unknown size' }})
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        No prayer recordings found. Check back later for updates.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $sermons->links('pagination::bootstrap-5') }}
        </div>

        <div id="no-results" class="alert alert-info mt-4 d-none">
            <i class="bi bi-info-circle me-2"></i>
            No prayers match your search. Try different date.
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <style>
            .card {
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            }

            /* Ensure buttons don't get too small on mobile */
            @media (max-width: 576px) {
                .card-footer .btn {
                    padding: 0.375rem 0.5rem;
                    font-size: 0.875rem;
                }
            }

            /* High contrast mode support */
            @media (forced-colors: active) {
                .card {
                    border: 1px solid ButtonText;
                }

                .btn-primary,
                .btn-outline-secondary {
                    border: 1px solid ButtonText;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('sermon-search');
                const sermonCards = document.querySelectorAll('.sermon-card');
                const sermonContainer = document.getElementById('sermon-container');
                const noResults = document.getElementById('no-results');

                function formatInputDate(dateString) {
                    const date = new Date(dateString);
                    const options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    return date.toLocaleDateString('en-US', options); // Example: May 2, 2025
                }

                searchInput.addEventListener('input', function() {
                    const searchDate = this.value;
                    console.log('Search Date:', searchDate);
                    const formattedSearchDate = formatInputDate(searchDate);
                    let matchCount = 0;
                    console.log('Search Date:', searchDate, 'Formatted:', formattedSearchDate);

                    sermonCards.forEach(card => {
                        const cardDateText = card.querySelector('p').textContent
                    .trim(); // e.g., "May 2, 2025"
                        if (searchDate === '' || cardDateText.includes(formattedSearchDate)) {
                            card.classList.remove('d-none');
                            matchCount++;
                        } else {
                            card.classList.add('d-none');
                        }
                    });

                    noResults.classList.toggle('d-none', !(matchCount === 0 && searchDate !== ''));
                });

                // Add keyboard accessibility for cards
                sermonCards.forEach(card => {
                    card.addEventListener('keydown', function(e) {
                        // Enter key
                        if (e.key === 'Enter') {
                            const playLink = this.querySelector('a.btn-primary');
                            if (playLink) {
                                playLink.click();
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
