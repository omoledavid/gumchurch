<x-app-layout :$pageName>
    <x-banner :$pageName/>
    <div class="event-section-2 section-padding pb-80px">
        <div class="container">
            <div class="row">
                @foreach($events as $event)
                    <x-events.event-card :$event/>
                @endforeach
            </div>


            @if($events->count() > 5)
                <div class="row">
                    <div class="col-12 d-flex justify-content-lg-start justify-content-center mt-5">
                        <nav aria-label="Page navigation example">
                            {{ $events->links('vendor.pagination.custom') }}
                        </nav>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
