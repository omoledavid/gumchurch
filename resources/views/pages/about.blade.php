<x-app-layout :$pageName>
    <x-banner :$pageName />
    
    <!-- Blessed - Quick Info Section -->
    {{-- <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="about-box-1">
                        <img src="{{ asset('assets/images/about/icon-0.png') }}" alt="GUM" class="mb-3">
                        <h2 class="fw-medium mb-0">84</h2>
                        <h4 class="fw-medium mb-2">Around the World</h4>
                        <p class="fs-6text-300">Our mission is to provide a space for seekers to explore their faith, ask
                            questions, and find meaning and purpose in their lives.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-box-2">
                        <img src="{{ asset('assets/images/about/icon-1.png') }}" alt="GUM" class="mb-3">
                        <h2 class="fw-medium mb-0">163</h2>
                        <h4 class="fw-medium mb-2">Pastors</h4>
                        <p class="fs-6text-300">At God's Unification Mission, discover a welcoming community where you can find solace
                            during tough times, connect with fellow travelers.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-box-3">
                        <img src="{{ asset('assets/images/about/icon-2.png') }}" alt="GUM" class="mb-3">
                        <h2 class="fw-medium mb-0">+600</h2>
                        <h4 class="fw-medium mb-2">Projects Supported</h4>
                        <p class="fs-6text-300">Together, we can journey toward deeper understanding, greater compassion,
                            and a world filled with love and justice for all.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Our History Section -->
    <section class="About-section-4 pt-80px pb-80px position-relative">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 ps-lg-4 pe-4">
                    <img class="" src="{{ asset('assets/images/about/history.jpg') }}" data-aos="zoom-in" alt="GUM">
                </div>
                <div class="col-lg-6 d-flex align-content-start mt-4 mt-lg-0 flex-wrap ps-4">
                    <h2 class="fw-normal mb-3" data-aos="fade-up">Our History</h2>
                    <p data-aos="fade-up mb-2">
                        God's Unification Mission, founded with a vision of unity and faith, is a dynamic spiritual community committed to fostering deeper connections with the divine and with one another. Our church provides a welcoming and inclusive environment where individuals from all walks of life can explore their faith, ask questions, and find meaning and purpose in their lives.
                    </p>
                    <p class="mb-0" data-aos="fade-up">
                        Rooted in love and guided by faith, God's Unification Mission offers a variety of worship services, spiritual formation opportunities, and community outreach programs to meet the diverse needs of our congregation and the wider community. Led by a compassionate team of clergy and volunteers, we strive to create a space where everyone is embraced just as they are.
                    </p>
                </div>
            </div>
        </div>
        <div class="wrap-asset-about position-absolute">
            <img class="alltuchtopdown" src="{{ asset('assets/images/about/img-bg-sec-4.png') }}" alt="GUM">
        </div>
    </section>

    <!-- Call to Action Section -->
    {{-- <section>
        <div class="container">
            <div class="about-box-4">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="pe-md-0 pe-lg-5">
                            <h2 class="mb-3">Planning Your Visit</h2>
                            <p class="mb-3">Whether you're organizing a family outing or arranging a school excursion,
                                there's a plethora of captivating experiences awaiting you within our walls.</p>
                            <p class="mb-5">Daily guided tours, conducted by our knowledgeable volunteers, offer insights
                                into our rich history and architectural marvels. Additionally, interactive activities on the
                                Cathedral floor provide engaging explorations. Be sure to check our What's On calendar for
                                upcoming services, special performances, talks, workshops, and other events.</p>
                            <a href="" class="btn text-white rounded-5 mb-4 mb-lg-0 btn-circle-arrow" data-aos="flip-up">
                                <span>Donation Now</span>
                                <span class="bg-transparent ms-2">
                                    <i class="size-16" data-feather="arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 text-center">
                        <img src="{{ asset('assets/images/about/img-1.png') }}" alt="GUM">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Contact Section -->
    <section class="pb-110px position-relative mt-40">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="contact__content">
                        <div class="section-title tg-heading-subheading animation-style3 mb-4">
                            <p class="sub-title fs-5">Contact</p>
                            <h5 class="title tg-element-title ds-5 fw-normal">Get in Touch</h5>
                        </div>
                        <div class="contact__info">
                            <ul class="list-wrap">
                                <li class="mb-4">
                                    <div class="icon-1">
                                        <a href="tel:0123456789">
                                            <i class="size-32" data-feather="phone-call"></i>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="title fs-7">Hotline</p>
                                        <a class="fs-5 text-dark" href="tel:{{formatPhoneNumber($general->site_phone)}}">{{formatPhoneNumber($general->site_phone)}}</a>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="icon-1">
                                        <a href="mailto:info@gmail.com">
                                            <i class="size-32" data-feather="mail"></i>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="title fs-7">Send us an email</p>
                                        <a class="fs-5 text-dark" href="mailto:{{$general->site_email}}">{{$general->site_email}}</a>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="icon-1">
                                        <a href="javascript::">
                                            <i class="size-32" data-feather="map-pin"></i>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="title fs-7">Address</p>
                                        <a class="fs-5 text-dark" >{{$general->site_address}} </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="contact__form-wrap">
                        <form class="contact-form" method="POST" action="">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="text-dark">Your Name*</span>
                                    <div class="form-grp">
                                        <input type="text" name="name" id="name" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-dark">Email Address*</span>
                                    <div class="form-grp">
                                        <input type="email" name="email" id="email" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-dark">Phone Number*</span>
                                    <div class="form-grp">
                                        <input type="tel" name="phone" id="phone" value="" required>
                                    </div>
                                </div>
                                <div class="form-grp">
                                    <span class="text-dark">Message*</span>
                                    <textarea name="message" id="message" class="message" required></textarea>
                                </div>
                            </div>
                            <div class="form-grp checkbox-grp">
                                <input type="checkbox" name="newsletter" id="checkbox">
                                <label class="text-dark" for="checkbox">I'd like to get news and insights from us</label>
                                <span class="ms-1 fs-8">(optional)</span>
                            </div>
                            <button type="submit" class="btn btn-full">Send message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>