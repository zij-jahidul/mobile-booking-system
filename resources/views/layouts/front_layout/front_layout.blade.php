<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Unicode -->
    <meta charset="UTF-8">
    <!-- Website Description -->
    <meta name="description" content="Electronics Reapair Services">
    <!-- keywords use -->
    <meta name="keywords" content="HTML5,CSS3,BootStrap4,JavaScript,Jaquery,Fontawsome">
    <!-- Author Name -->
    <meta name="author" content="Zij Zahidul Islam Jiku">
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Web Site Name -->
    <title>
        @yield('title')
    </title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <!-- After Website icon -->
    <link rel="icon" href="google.png" type="images/google.png" sizes="16x16">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="{{ asset('front2') }}/css/all.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('front2') }}/css/slick.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('front2') }}/css/owl.carousel.min.css">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('front2') }}/css/animate.css">
    <!-- BootStrap 4 CSS link -->
    <link rel="stylesheet" href="{{ asset('front2') }}/css/bootstrap.min.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="{{ asset('front2') }}/css/style.css">
    <!-- Responsive Css (5 Device) -->
    <link rel="stylesheet" href="{{ asset('front2') }}/css/responsive.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('front') }}/css/style.min.css">


    <link rel="stylesheet" href="{{ asset('front') }}/css/plugins/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('front') }}/css/vendor/plugins.min.css">
        {{-- <link rel="stylesheet" href="{{ asset('front') }}/css/style.min.css"> --}}
        <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap-social.css">
        <link rel="stylesheet" href="{{ asset('front') }}/css/responsive.min.css">
        <link rel="stylesheet" href="{{ asset('front') }}/css/nice-select.css">




    @yield('social_meta')


    @yield('style')


</head>

<body>

    <div class="overflow_hidden">

    @include('layouts.front_layout.front_header')
    <!--Header Part End -->

    @include('front.banners.home_page_banner')
    <!-- Banner Part Start -->
    {{-- <div class="container"> --}}

        @yield('content')
    {{-- </div> --}}


    <!-- Footer Part Start -->
    @include('layouts.front_layout.front_footer')

</div>
    <!-- Script Area Start -->
    <!-- Jquery Main File - v.1.12.v all -->
    <script src="{{ asset('front2') }}/js/jquery-1.12.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{ asset('front2') }}/js/popper.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('front2') }}/js/bootstrap.min.js"></script>
    <!-- Slick js -->
    <script src="{{ asset('front2') }}/js/slick.min.js"></script>
     <!-- owl.carousel.2.0.0-beta.2.4 css -->
     <script src="{{ asset('front2') }}/js/owl.carousel.min.js"></script>
    <!-- Fontaswome Js -->
    <script src="{{ asset('front2') }}/js/all.min.js"></script>
    <!-- wow js -->
    <script src="{{ asset('front2') }}/js/wow.min.js"></script>
    <!-- Javascript and jquery Main File -->
    <script src="{{ asset('front2') }}/js/script.js"></script>
    <!-- Script Area End -->

    {{-- <script src="{{ asset('front') }}/js/vendor/jquery-3.5.1.min.js"></script> --}}
    <script src="{{ asset('front') }}/js/vendor/modernizr-3.7.1.min.js"></script>


    <script src="{{ asset('front') }}/js/plugins.min.js"></script>
    <script src="{{ asset('front') }}/js/jquery.nice-select.js"></script>

    <!-- Main Activation JS -->
    <script src="{{ asset('front') }}/js/main.js"></script>
    <script src="{{ asset('front') }}/js/front_script.js"></script>
    <!-- Select2 -->
<script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5f1ecae95e51983a11f5df60/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>


@yield('footer_script')


</body>

</html>
