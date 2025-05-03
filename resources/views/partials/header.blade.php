<header class="transparent-header ">
    <div class="tc-header__top d-none d-xxl-block d-xl-block">
        <div class="container custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 justify-content-md-center">
                    <div class="position-relative overflow-hidden top-news">
                        <div class="swiper-1-vertical">
                            <div class="swiper-wrapper">
                                {{-- upcoming slider --}}
                                @if ($events->count())
                                    @foreach ($events as $event)
                                        <x-upcoming :$event />
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="tc-header__top-right list-wrap fs-7 fw-normal">
                        <li>
                            <i class="size-16" data-feather="phone"></i>
                            <a href="tel:{{ formatPhoneNumber($general->site_phone) ?? '' }}"><span
                                    class="text-dark">{{ formatPhoneNumber($general->site_phone) ?? '' }}</span></a>
                        </li>
                        <li>
                            <i class="size-16" data-feather="map-pin"></i>
                            <span class="text-dark">{{ $general->site_address ?? '' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- While User Scroll to Dispaly Sticky Header
    =============================================== -->
    <div id="sticky-header" class="tc-header__area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap py-xxl-0 py-xl-0 py-3">
                        <nav
                            class="tgmenu__nav d-flex align-items-center justify-content-between justify-content-xxl-between justify-content-xl-evenly">
                            <div class="logo">
                                <a class="d-flex align-items-center" href="{{ route('home') }}">
                                    <img src="{{ logo() }}" alt="gum">
                                </a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xxl-flex d-xl-flex">
                                <!--Main Menu-->
                                @include('partials.nav')
                            </div>
                            <div class="tgmenu__action d-none d-xxl-flex">
                                <ul class="list-wrap">
                                    <li class="header-search">
                                        <a href="javascript:" class="search-open-btn">
                                            <i class="size-24" data-feather="search"></i>
                                        </a>
                                    </li>
                                    <li class="header-language d-none d-xl-block">
                                        <a href="javascript:" class="d-inline-flex align-items-center gap-1">
                                            <i class="size-16" data-feather="globe"></i>
                                            <span class="fs-6 text-400">EN</span>
                                            <i class="size-16" data-feather="chevron-down"></i>
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a class="dropdown-item" href="javascript:">English</a></li>
                                            <li><a class="dropdown-item" href="javascript:">French</a></li>
                                            <li><a class="dropdown-item" href="javascript:">German</a></li>
                                            <li><a class="dropdown-item" href="javascript:">Spanish</a></li>
                                        </ul>
                                    </li>
                                    <li class="header-btn">
                                        <a href="javascript:"
                                            class="btn text-white rounded-5 btn-circle-arrow menu-tigger">
                                            <span>Reachout</span>
                                            <span class="bg-transparent ms-2">
                                                <i class="size-16" data-feather="arrow-right"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="mobile-nav-toggler d-block d-xxl-none d-xl-none d-flex justify-content-center align-items-center justify-content-end">
                                <i data-feather="menu"></i>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    @include('partials.mobile-menu')
                    <div class="tgmobile__menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>

    <!-- When User Click on Search icon to display Search Form
    ========================================================== -->
    <div class="search__popup">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search__wrapper">
                        <div class="search__close">
                            <button type="button" class="search-close-btn">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="search__form">
                            <form action="javascript:">
                                <div class="search__input">
                                    <input class="search-input-field" id="search-input-field" type="text"
                                        placeholder="Type keywords here">
                                    <span class="search-focus-border"></span>
                                    <button>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-popup-overlay"></div>

    <!-- Quick Contact Us Sidebar
    ============================= -->
    <div class="offCanvas__info">
        <div class="offCanvas__close-icon menu-close">
            <button><i class="far fa-window-close"></i></button>
        </div>
        <div class="offCanvas__logo mb-30">
            <a href="{{ route('home') }}"><img src="{{ logo() }}" alt="gum"></a>
        </div>
        <div class="offCanvas__side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                <p>{!! $general->site_address !!}</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p>{{ formatPhoneNumber($general->site_phone) ?? '' }}</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p>{{ $general->site_email }}</p>
            </div>
        </div>
        <div class="offCanvas__social-icon mt-30">
            <a href="javascript:"><i class="fab fa-facebook-f"></i></a>
            <a href="javascript:"><i class="fab fa-twitter"></i></a>
            <a href="javascript:"><i class="fab fa-google-plus-g"></i></a>
            <a href="javascript:"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <div class="offCanvas__overly"></div>

</header>
