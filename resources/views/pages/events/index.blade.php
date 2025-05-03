<x-app-layout :$pageName>
    <x-banner :$pageName />
    <div class="event-section-2 section-padding pb-80px">
        <div class="container">
            @if ($events && $events->count() > 0)
                <div class="row">
                    @foreach ($events as $event)
                        <x-events.event-card :$event />
                    @endforeach
                </div>


                @if ($events->count() > 5)
                    <div class="row">
                        <div class="col-12 d-flex justify-content-lg-start justify-content-center mt-5">
                            <nav aria-label="Page navigation example">
                                {{ $events->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                    </div>
                @endif
            @else
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        No Events. Check back later for updates.
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
