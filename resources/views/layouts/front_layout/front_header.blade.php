@php
    use App\Section;
    $sections = Section::sections();
    // echo '<pre>';
    //     print_r($sections);
    //     die();
    // use App\Cart;


@endphp



<div id="header_contact_bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('front2') }}/images/logo.png" alt="">
                </a>
            </div>

            <div class="col-lg-6">
                <div class="search_bar animated fadeInDown">
                    <form class="example" action="{{ url('search/search') }}" method="GET">
                        <input type="text" placeholder="Search.." name="filter[product_name]">
                        @php
                                        session(['search'=>'filter[product_name]']);
                                    @endphp
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <div class="col-lg-3 col-sm-8 col-8">
                <div class="row col_sm">
                    <div class="col-lg-12">
                        <p style="margin: 0; padding: 0;" class="para_one"><i class="fas fa-phone-volume pr-2"></i><a href="tel:+0987732264" class="text-dark">+0987732264</a></p>
                    </div>

                    <div class="col-lg-12">
                        <p style="margin: 0; padding: 0;" class="para_header_responsive"><i class="far fa-envelope pr-2"></i> <a href="mailto:haquetelecom75@gmail.com" class="text-dark">haquetelecom75@gmail.com</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-1 col-sm-8 col-4">
                    <li class="nav-item dropdown" style="list-style: none;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         @auth
                            <span class="mt-3 text-dark mr-1" style="font-size:24px;"> {{ Auth::user()->name }} </span> <i class="far fa-user fa-2x mt-3 mb-2 text-dark"></i>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('customer/my-booking') }}">Booking</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                         @endauth

                         @guest
                             <i class="far fa-user fa-2x mt-2 text-dark"></i>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
                            </div>
                         @endguest
                        </a>
                        
                    </li>

            </div>

        </div>
    </div>
</div>

<header class="main-header">
    <div class="header-navigation sticky-nav">
        <div class="container">
            <div class="row">
                <!-- Logo Start -->
                <div class="col-md-2 col-sm-2">
                    <div class="logo">

                    </div>
                </div>
                <!-- Logo End -->
                <!-- Navigation Start -->
                <div class="col-md-10 col-sm-10">
                    <!--Main Navigation Start -->
                    <div class="main-navigation d-none d-lg-block">
                        <ul>
                            <li class="menu-dropdown">
                                <a href="{{ url('/') }}">Home</a>

                            </li>

                            @foreach ($sections as $section)
                                @if (count($section['categories'])>0)
                                @foreach ($section['categories'] as $category)
                            <li class="menu-dropdown">
                                <a href="{{ url($category['category_url']) }}/category">{{ $category['category_name'] }} <i class="ion-ios-arrow-down"></i></a>
                                <ul class="sub-menu">
                                    @foreach ($category['subcategories'] as $subcategory)
                                        <li><a href="{{ url($subcategory['category_url']) }}">{{ $subcategory['category_name'] }}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                            @endforeach
                            @endif
                            @endforeach


                            <li><a href="{{ url('customer/contact-us') }}">Contact Us</a></li>
                            <li><a href="{{ url('customer/about-us') }}">About Us</a></li>

    
                        </ul>
                    </div>
                    <!--Main Navigation End -->
                    <!--Header Bottom Account Start -->
                    <div class="header_account_area">
                        <!--Seach Area Start -->

                        <!--Seach Area End -->
                        <!--Contact info Start -->

                        <!--Contact info End -->
                        <!--Cart info Start -->
                        <div class="cart-info d-flex">
                            <div class="mini-cart-warp">

                            </div>
                        </div>
                        <!--Cart info End -->
                    </div>
                </div>
            </div>
            <!-- mobile menu -->
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <span class="span_icon"></span>

                        <ul class="menu-overflow">
                            <li>
                                <a href="{{ url('/') }}">HOME</a>
                            </li>
                            @foreach ($sections as $section)
                                @if (count($section['categories'])>0)
                                    @foreach ($section['categories'] as $category)
                                    <li>
                                        <a href="{{ url($category['category_url']) }}/category">{{ $category['category_name'] }}</a>
                                        <ul>
                                            @foreach ($category['subcategories'] as $subcategory)
                                                <li><a href="{{ url($subcategory['category_url']) }}">{{ $subcategory['category_name'] }}</a></li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    @endforeach
                                @endif
                            @endforeach

                            <li><a href="{{ url('customer/contact-us') }}">Contact Us</a></li>
                            <li><a href="{{ url('customer/about-us') }}">About Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- mobile menu end-->
        </div>
    </div>
    <!--Header Bottom Account End -->
</header>






<!-- /.header_area -->
