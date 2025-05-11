<x-app-layout :$pageName>
    <x-banner :$pageName />
    @if (session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
            <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <!-- Contact Information Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-5 mb-lg-0">
                    <div class="contact-info-block">
                        <div class="section-title mb-4">
                            <span class="sub-title">Get in Touch</span>
                            <h2 class="title">Contact Information</h2>
                        </div>

                        <p class="mb-4">We'd love to hear from you. Please reach out to us with any questions, prayer
                            requests, or inquiries about our services and ministries.</p>

                        <div class="contact-details">
                            <div class="contact-item d-flex mb-4">
                                <div class="contact-icon me-3">
                                    <i data-feather="map-pin" class="size-24"></i>
                                </div>
                                <div class="contact-text">
                                    <h5 class="mb-1">Our Location</h5>
                                    <p class="mb-0">{{ $general->site_address }}</p>
                                </div>
                            </div>

                            <div class="contact-item d-flex mb-4">
                                <div class="contact-icon me-3">
                                    <i data-feather="phone" class="size-24"></i>
                                </div>
                                <div class="contact-text">
                                    <h5 class="mb-1">Phone Numbers</h5>
                                    <p class="mb-1">Main Line: <a
                                            href="tel:(229) 555-0109">{{ formatPhoneNumber($general->site_phone) }}</a>
                                    </p>
                                    @if ($general?->site_phone_2)
                                        <p class="mb-0">Secondary Line: <a
                                                href="tel:(229) 555-0110">{{ formatPhoneNumber($general->site_phone_2) }}</a>
                                        </p>
                                        <p class="mb-0">Prayer Line: <a
                                                href="tel:(229) 555-0110">{{ formatPhoneNumber($general->site_phone_2) }}</a>
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="contact-item d-flex mb-4">
                                <div class="contact-icon me-3">
                                    <i data-feather="mail" class="size-24"></i>
                                </div>
                                <div class="contact-text">
                                    <h5 class="mb-1">Email Addresses</h5>
                                    <p class="mb-1">General Inquiries: <a
                                            href="mailto:info@gum.org">{{ $general->site_email }}</a></p>
                                </div>
                            </div>

                            <div class="contact-item d-flex mb-4">
                                <div class="contact-icon me-3">
                                    <i data-feather="clock" class="size-24"></i>
                                </div>
                                <div class="contact-text">
                                    <h5 class="mb-1">Service Time</h5>
                                    <p class="mb-1">Sunday Service: 8:00 AM and 11:00 AM</p>
                                    <p class="mb-1">Tuesday: Midnight(12:00 AM) Prayer on Zoom</p>
                                    <p class="mb-1">Wednesday Service: Prayer at 6:30 PM</p>
                                    <p class="mb-0">Friday: Midnight(12:00 AM) Prayer on Zoom</p>
                                </div>
                            </div>
                        </div>

                        <div class="social-links mt-4">
                            <h5 class="mb-3">Connect With Us</h5>
                            <ul class="list-inline">
                                <li class="list-inline-item me-3">
                                    <a href="#" class="social-link">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item me-3">
                                    <a href="#" class="social-link">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item me-3">
                                    <a href="#" class="social-link">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="contact-form-block p-4 p-md-5 bg-light rounded-4">
                        <h3 class="mb-4">Send Us a Message</h3>

                        <form action="{{ route('form.submit') }}" method="POST" class="contact-form">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Your Name*</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email Address*</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject" class="form-label">Subject*</label>
                                        <select class="form-select" id="subject" name="subject" required>
                                            <option value="">Select a subject</option>
                                            <option value="General Inquiry">General Inquiry</option>
                                            <option value="Prayer Request">Prayer Request</option>
                                            <option value="Volunteering">Volunteering</option>
                                            <option value="Event Information">Event Information</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message" class="form-label">Your Message*</label>
                                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="newsletter"
                                            name="newsletter">
                                        <label class="form-check-label" for="newsletter">
                                            I'd like to receive news and updates from GUM
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn text-white rounded-5 btn-circle-arrow">
                                        <span>Send Message</span>
                                        <span class="bg-transparent ms-2">
                                            <i class="size-16" data-feather="arrow-right"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    {{-- <section class="section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215120408327!2d-73.98790382426208!3d40.75802974261466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1648482801933!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- FAQ Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <span class="sub-title">Common Questions</span>
                        <h2 class="title">Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <!-- Question 1 -->
                        <div class="accordion-item mb-3 border-0 rounded-4">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button rounded-4" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What time are your services?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Our main worship services are held every Sunday at 9:00 AM and 11:00 AM. We also
                                        have Sunday School at 8:00 AM. During the week, we have Prayer meeting at 12:00.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="accordion-item mb-3 border-0 rounded-4">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed rounded-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    How do I become a member of your church?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>We welcome anyone interested in becoming a member of our church. The process
                                        begins with attending our membership classes, which are held quarterly. These
                                        classes provide an overview of our beliefs, values, and expectations for
                                        members. After completing the classes, you'll meet with a pastor for a brief
                                        conversation about your faith journey. Membership is then confirmed during a
                                        special ceremony during a regular Sunday service.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="accordion-item mb-3 border-0 rounded-4">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed rounded-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Do you have programs for children and youth?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Yes, we have comprehensive programs for children and youth of all ages. For
                                        children, we offer age-appropriate Sunday School classes, children's church
                                        during the main service, and various activities throughout the week. Our youth
                                        ministry serves teenagers with weekly meetings, Bible studies, service projects,
                                        and special events. All our children and youth programs are led by trained
                                        volunteers who have undergone background checks to ensure a safe environment.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 4 -->
                        <div class="accordion-item mb-3 border-0 rounded-4">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed rounded-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    How can I get involved in volunteering?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>We have numerous volunteer opportunities available in various ministries. To get
                                        started, you can fill out a volunteer interest form at the welcome desk or on
                                        our website. Our volunteer coordinator will then contact you to discuss your
                                        interests, skills, and availability. We believe everyone has gifts to share, and
                                        we're committed to helping you find a meaningful way to serve that aligns with
                                        your talents.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 5 -->
                        <div class="accordion-item border-0 rounded-4">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed rounded-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    How can I request prayer or spiritual counseling?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Prayer requests can be submitted through our website, by calling our prayer line
                                        at {{ formatPhoneNumber($general->site_phone) }}, or by filling out a prayer
                                        card during any service. For spiritual counseling, you can contact our pastoral
                                        care team to schedule an appointment. Our pastors and trained counselors are
                                        available to provide guidance and support through life's challenges in a
                                        confidential and compassionate setting.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
