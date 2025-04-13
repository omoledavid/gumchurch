<section class="section-padding position-relative">
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
                                    <a href="mailto:info@gmail.com">
                                        <i class="size-32" data-feather="mail"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <p class="title fs-7">Send us an email</p>
                                    <a class="fs-5 text-dark" href="mailto:info@gmail.com">{{$general->site_email ?? ''}}</a>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="icon-1">
                                    <a href="tel:0123456789">
                                        <i class="size-32" data-feather="phone"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <p class="title fs-7">Give us a call</p>
                                    <a class="fs-5 text-dark" href="tel:{{formatPhoneNumber($general->site_phone) ?? ''}}">{{formatPhoneNumber($general->site_phone) ?? ''}} </a>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="icon-1">
                                    <a href="https://www.google.com/maps">
                                        <i class="size-32" data-feather="map-pin"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <p class="title fs-7">Address</p>
                                    <a class="fs-5 text-dark" href="https://www.google.com/maps">{{$general->site_address ?? ''}}</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-12">

                <div class="contact__form-wrap">

                    <form class="contact-form" method="get" action="">

                        <!-- Write Email Subject
                        ======================== -->
                        <input type="hidden" id="subject" name="subject" value="Get in Touch">

                        <div class="row">
                            <div class="col-md-12">
                                <span class="text-dark">Your Name*</span>
                                <div class="form-grp">
                                    <input type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-dark">Email Address*</span>
                                <div class="form-grp">
                                    <input type="email" name="email" id="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-dark">Phone Number*</span>
                                <div class="form-grp">
                                    <input type="text" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="form-grp">
                                <span class="text-dark">Message*</span>
                                <textarea name="message" id="message" class="message"></textarea>
                            </div>
                        </div>
                        <div class="form-grp checkbox-grp">
                            <input type="checkbox" name="checkbox" id="checkbox" class="message">
                            <label class="text-dark" for="checkbox">I’d like to get news and insights
                                from us</label>
                            <span class="ms-1 fs-8">(optional)</span>
                        </div>
                        <button type="submit" class="btn btn-full">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-top-sec-8 d-none d-lg-block alltuchtopdown">
        <img src="assets/images/about/img-bg-sec-8.png" alt="gum" data-aos="fade-right" data-aos-delay="400" class="aos-init aos-animate img-bg">
    </div>
</section>