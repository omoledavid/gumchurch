<div class="tgmobile__menu">
    <nav class="tgmobile__menu-box">
        <div class="close-btn"><i class="fas fa-times"></i></div>
        <div class="nav-logo">
            <a href="{{route('home')}}"><img src="{{logo()}}" alt="Blessed"></a>
        </div>
        <div class="tgmobile__search">
            <form action="javascript:">
                <input type="text" id="search-field" class="search-field" placeholder="Search here...">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="tgmobile__menu-outer">
        </div>
        <div class="tgmobile__menu-bottom">
            <div class="contact-info">
                <ul class="list-wrap">
                    <li><a href="mailto:{{$general->site_email ?? ''}}">{{$general->site_email ?? ''}}</a></li>
                    <li><a href="tel:{{$general->site_phone ?? ''}}">{{formatPhoneNumber($general->site_phone) ?? ''}}</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="list-wrap">
                    <li><a href="javascript:"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="javascript:"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="javascript:"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="javascript:"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="javascript:"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
