@props(['pageName'])
<!DOCTYPE html>

<html class="no-js" lang="en">
<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Blessed - HTML Template Build For Church">
    <meta name="keywords" content="HTML5, charity HTML, church, churches, donation, ministry, mosque, ngo, non-profit, prayer, religion, religious">
    <meta name="author" content="wp-organic">
    <meta name="MobileOptimized" content="320">

    <!-- Titles
    ================================================== -->
    <title>{{gs('site_name')}} - {{$pageName}}</title>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" type="image/x-icon" href="{{favicon()}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{favicon()}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{favicon()}}">

    <!-- Custom Font ( Fontawesome + Falticon + Google Font )
    ======================================================-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Halant:wght@300;400;500;600;700&amp;family=Sora:wght@100..800&amp;display=swap">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/library/font-awesome-5.15.4/fontawesome-all.min.css')}}">

    <!-- CSS ( Bootstrap + Owlcarouse + Imagehover + MagnificPopup + MenuMaker + Custom Style )
    ======================================================================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/library/bootstrap-5.3.2/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/library/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/library/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/library/odometer/odometer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/library/swiper/swiper-bundle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/library/aos/aos.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    
    {{-- midnight player --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/midnight-prayer-player.css')}}">
    <!-- Custom - CSS here -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/style.css')}}">

</head>
<!-- end head -->

<!-- body start -->
<body>

<!--  Preloader - When Document load to display
=============================================== -->
<div id="preloader">
    <div id="loader" class="loader">
        <div class="loader-container text-center">
            <div class="loader-icon"><img src="{{favicon()}}" alt="Preloader"></div>
            <h6 class="text-center">{{$general->site_name}}</h6>
        </div>
    </div>
</div>

<!-- Header Style One
===================== -->
@include('partials.header')

<!-- Content Area
================= -->
<main class="fix">
    {{ $slot }}
</main>

<!-- Footer Widget Area
======================= -->
@include('partials.footer')

<!--  Back To Top - Button When Document Scroll Down to Display
============================================================== -->
<button class="scroll__top scroll-to-target" data-target="html"><i class="fas fa-angle-up"></i></button>

<!-- Blessed Template - Jquery Library Script Files
=================================================== -->
<script src="{{asset('assets/library/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/library/bootstrap-5.3.2/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/library/magnific-popup/magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/library/odometer/odometer.min.js')}}"></script>
<script src="{{asset('assets/library/jquery.appear/script.js')}}"></script>
<script src="{{asset('assets/library/parallax-scroll/jquery.parallaxScroll.min.js')}}"></script>
<script src="{{asset('assets/library/isotop/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/library/images-loaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/library/swiper/swiper-bundle.js')}}"></script>
<script src="{{asset('assets/library/wow/wow.min.js')}}"></script>
<script src="{{asset('assets/library/aos/aos.js')}}"></script>
<script src="{{asset('assets/library/feather/feather.min.js')}}"></script>
<script src="{{asset('assets/library/gsap-3.10.4/gsap.js')}}"></script>
<script src="{{asset('assets/library/gsap-3.10.4/ScrollTrigger.js')}}"></script>
<script src="{{asset('assets/library/gsap-3.10.4/SplitText.js')}}"></script>

{{-- midnight player --}}
<script src="{{asset('js/midnight-prayer-video-player.js')}}"></script>

<!-- Blessed - Template Custom Script
===================================== -->
<script src="{{asset('assets/script.js')}}"></script>
{{--audio player--}}
<x-audio-player/>
<script>
    const player = document.getElementById('floating-audio-player');
    const audio = document.getElementById('audio-element');
    const pauseBtn = document.getElementById('pause-btn');
    const closeBtn = document.getElementById('close-btn');
    const audioTitle = document.getElementById('audio-title');
    const seekForwardBtn = document.getElementById('seek-forward');
    const seekBackwardBtn = document.getElementById('seek-backward');

    // Function to open player
    function openAudioPlayer(src, title = 'Now Playing') {
        audio.src = src;
        audioTitle.textContent = title;
        player.style.display = 'block';

        // Start playing and store info
        audio.play();
        pauseBtn.textContent = '⏸';

        localStorage.setItem('audioSrc', src);
        localStorage.setItem('audioTitle', title);
        localStorage.setItem('audioTime', 0); // reset time
    }

    // Pause and resume
    pauseBtn.onclick = () => {
        if (audio.paused) {
            audio.play();
            pauseBtn.textContent = '⏸';
        } else {
            audio.pause();
            pauseBtn.textContent = '▶';
        }
    };

    // Close player
    closeBtn.onclick = () => {
        audio.pause();
        player.style.display = 'none';
        localStorage.removeItem('audioSrc');
        localStorage.removeItem('audioTitle');
        localStorage.removeItem('audioTime');
    };

    // Seek forward (10s)
    seekForwardBtn.onclick = () => {
        audio.currentTime += 10;
    };

    // Seek backward (10s)
    seekBackwardBtn.onclick = () => {
        audio.currentTime -= 10;
    };

    // Save playback time every second
    setInterval(() => {
        if (!audio.paused) {
            localStorage.setItem('audioTime', audio.currentTime);
        }
    }, 1000);

    // Restore on page reload
    window.onload = () => {
        const savedSrc = localStorage.getItem('audioSrc');
        const savedTitle = localStorage.getItem('audioTitle');
        const savedTime = localStorage.getItem('audioTime');

        if (savedSrc) {
            audio.src = savedSrc;
            audioTitle.textContent = savedTitle;
            player.style.display = 'block';
            audio.currentTime = savedTime ? parseFloat(savedTime) : 0;
            audio.play();
            pauseBtn.textContent = '⏸';
        }
    };
</script>


</body>
<!-- body end -->
</html>
