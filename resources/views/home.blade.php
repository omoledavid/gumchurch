<x-app-layout :$pageName>
    <!-- Hero Slider Section
    =================== -->
    @include('sections.home.hero-slider')
    <!-- Upcoming Events Section
            ============================= -->
    @include('sections.home.events')
    <!-- About Us Section
            ============================= -->
    @include('sections.home.about')
    <!-- Our Sermons
    ================ -->
    @include('sections.home.sermons')
    <!-- Call to Action Donation Section
    =========================== -->
    @include('sections.home.cta-donation')
    <!-- Latest News ( Blog ) Section
    ================================= -->
    @include('sections.home.blog')
    <!-- Testimonies
    ================================= -->
    @include('sections.home.testimonies')
    <!-- Call to Action Footer Section
    =========================== -->
    @include('sections.home.cta-footer')
</x-app-layout>
