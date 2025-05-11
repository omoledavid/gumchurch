<x-app-layout :$pageName>
    <div class="envent-details-header">
        <div class="page-header" >
        </div>
    </div>
    <section class="event-details-section-1 pt-80px">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-center">

                </div>
                <div class="col-12 d-flex align-items-center flex-column mb-4 mb-lg-0 justify-content-center ">
                    <h1 class="text-center page-title fw-medium">Jedi Ukoko</h1>
                    <p class="text-dark text-center w-80 pb-2">Pastor Jedi Ukoko leads with grace, vision, and a deep
                        commitment to God’s calling. His years of faithful service, combined with a genuine love for
                        people, make him a pillar of strength and guidance in our church. Through his leadership, we are
                        continually encouraged to grow in faith, unity, and purpose.</p>
                    <div class="icon-top d-flex gap-1">
                        <a href="https://www.facebook.com/" target="_blank"
                            class="text-dark rounded-5 size-50 d-block hover-up"><i
                                class="p-2 fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/" target="_blank"
                            class="text-dark rounded-5 size-50 d-block hover-up"><i
                                class="p-2 fab fa-instagram"></i></a>
                        <a href="https://www.twitter.com/" target="_blank"
                            class="text-dark rounded-5 size-50 d-block hover-up"><i
                                class="p-2 fab fa-pinterest-p"></i></a>
                        <a href="https://dribbble.com/" target="_blank"
                            class="text-dark rounded-5 size-50 d-block hover-up"><i class="p-2 fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container container-1">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{-- <img src="assets/images/pastor-details/img-pastor-details-sec-1.png" alt="gum"> --}}
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col"></div>
                <div class="col-lg-8 col-10">
                    <h4 class="fw-medium pb-2">
                        About Pastor Jedi Ukoko
                    </h4>
                    <p class="pb-4 text-400">Our Pastor, Jedidiah Ukoko, received his divine calling at the age of seven
                        in 1968, when Jesus appeared to him and entrusted him with a set of golden keys. Though he never
                        attended a Bible school, he relies solely on the guidance of the Holy Spirit in all matters
                        concerning the church, free from man-made doctrines and traditions. At God's Unification
                        Mission, we firmly
                        believe that only the truth can set one free, and so we commit to teaching and upholding only
                        what the Holy Spirit confirms as truth—regardless of popular opinions or widespread theological
                        trends. With the awareness that we will one day give account to the One who called us, we carry
                        out our mission with reverence and dedication. Pastor Ukoko has been given a divine mandate to
                        unify the body of Christ by proclaiming God's pure and undiluted Word, making plain the hidden
                        truths to his generation</p>
                </div>
                <div class="col-lg-2 col"></div>
            </div>
        </div>
        <!--slider x-pastor.img-slider -->

        <div class="container">
            <div class="row">
                <div class="col-lg-2 col"></div>
                <div class="col-lg-8 col-10">
                    <h4 class="fw-medium pb-2">
                        Vision for God's Unification Mission
                    </h4>
                    <p class="pb-5 text-400">
                        Pastor Jedi Ukoko carries a vision for God's Unification Mission rooted in spiritual growth,
                        life
                        transformation, and lasting impact on the community. He sees a church that opens its doors to
                        everyone, where each person is cherished and equipped to walk boldly in their faith. Through his
                        guidance, we are encouraged to fulfill our purpose, influence the world for good, and be a
                        radiant reflection of God’s love throughout our neighborhoods and beyond.
                    </p>
                </div>
                <div class="col-lg-2 col"></div>
            </div>
        </div>
    </section>
    @include('sections.home.cta-footer')
    {{-- <x-contact-form /> --}}
</x-app-layout>
