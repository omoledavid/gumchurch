<ul class="navigation">
    <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{route('home')}}">Home</a></li>
    <li class="{{ request()->routeIs('about-us') ? 'active' : '' }}"><a href="{{route('about-us')}}">About Us</a></li>
    <li class="{{ request()->routeIs('events') ? 'active' : '' }}"><a href="{{route('events')}}">Events</a></li>
    <li class="{{ request()->routeIs('our-pastor') ? 'active' : '' }}"><a href="{{route('our-pastor')}}">Our Pastors</a></li>
    <li class="{{ request()->routeIs('sermons') ? 'active' : '' }}"><a href="{{route('sermons')}}">Sermons</a></li>
    <li class="{{ request()->routeIs('blogs') ? 'active' : '' }}"><a href="{{route('blogs')}}">Insight</a></li>
    <li class="{{ request()->routeIs('contact-us') ? 'active' : '' }}"><a href="{{route('contact-us')}}">Contact Us</a></li>
</ul>
