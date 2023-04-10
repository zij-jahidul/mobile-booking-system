@extends('layouts.front_layout.front_layout')

@php
    use App\Product;
    // $products = Product::get();
    // echo '<pre>';
    //     print_r($sections);
    //     die();
    // use App\Cart;


@endphp
{{-- SEO META TAG  --}}
@section('title')
ECOMMERCE WEB SITE
@endsection

@section('style')
<style>
    .map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
</style>
@endsection

@section('meta_keyword')
ECOMMERCE, WEB, SITE
@endsection

@section('meta_description')
Top e-commerce web site made by Abdullah Rafi
@endsection
{{-- SEO META TAG END --}}


@section('content')
<!-- Slider Part Start -->
<section id="slider_part">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="slider_head">
                    <h2>Service & Repair</h2>
                    <img src="{{ asset('front2') }}/images/line2.png" alt="line1">
                </div>
            </div>
        </div>

        <div class="row slide_main">
            @foreach ($categoryBrandItems as $categoryBrandItem)
            <div class="col-md-12" data-wow-duration="6s">
                <div class="slider_img">
                    <a href="{{ url($categoryBrandItem['category_url']) }}/category">
                        {{-- <img src="{{ asset('front2') }}/images/brand_apple.png" alt="slide1" class="img-fluid w-100"> --}}

                        @php
                                $product_image_path = 'images/category_images/'.$categoryBrandItem['category_image']
                            @endphp
                            @if (!empty($categoryBrandItem['category_image'])&&file_exists($product_image_path))
                            <img class="img-fluid w-100" src="{{ asset('images/category_images') }}/{{ $categoryBrandItem['category_image'] }}" alt="" />
                            @else
                            <img class="img-fluid w-100" src="{{ asset('images/category_images') }}/no-image.png" alt="" />
                            @endif
                    </a>
                </div><!-- /. -->
            </div><!-- /. -->
            @endforeach


        </div>



    </div><!-- /.container -->
</section><!-- /.section end -->
<!-- Slider Part Start -->

<!-- Service And Repair Part Start -->
<div id="serviceandrepair">
    <div class="container animated fadeInRight">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h2 class="servie_h2">SERVICE RÉRARATION <br>
                    <span class="text-success">ORDINATEURS</span>
                </h2>
                <div class="line_bar servie_line"></div>
                <p class="servie_para">Nous réparons tous les types d’ordinateurs, quelque soit votre problèmes nos experts techniciens interviendront avec rapidité et profesionnalisme.</p>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <a href="{{ url('iphone-8qjom/category') }}">
                            <div class="brand_full">

                                <div class="brand_img">
                                    <img src="{{ asset('front2') }}/images/apple_mac.png" alt="Brand-One" class="img-fluid">

                                    <i class="fas fa-share share_icon_middle"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <a href="{{ url('laptop-thrl9') }}">
                            <div class="brand_full">

                                <div class="brand_img">
                                    <img src="{{ asset('front2') }}/images/apple_macbook.png" alt="Brand-One" class="img-fluid">
                                    <i class="fas fa-share share_icon_middle"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <a href="{{ url('iphone-8qjom/category') }}">
                            <div class="brand_full">

                                <div class="brand_img">
                                    <img src="{{ asset('front2') }}/images/ordinateur_pc.png" alt="Brand-One" class="img-fluid">
                                    <i class="fas fa-share share_icon_middle"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>



            </div>
        </div>
    </div>
</div>
<!-- Service And Repair Part End -->

<!-- Product Part Start -->
<div id="product_part">
    <div class="container animated fadeInLeft">
        <div class="row">
            <div class="col-12">
                <div class="test-title text-center">
                    <h3 class="">All Services</h3>
                    <img src="{{ asset('front2') }}/images/line2.png" alt="">
                </div>
            </div>
        </div>

        <div class="row text-center">
            <!-- forelse start -->
            @foreach ($allServices as $product)


            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}">
                    <div class="product_full">
                        <div class="product_img">
                            {{-- <img src="{{ asset('front2') }}/images/product1.png" alt="Product-One" class="img-fluid"> --}}
                            @php
                            $product_image_path = 'images/product_images/medium/'.$product['product_main_image']
                        @endphp
                            @if (!empty($product['product_main_image'])&&file_exists($product_image_path))
                            <img class="img-fluid" src="{{ asset('images/product_images/medium') }}/{{ $product['product_main_image'] }}" alt="" />
                            @else
                            <img class="img-fluid" src="{{ asset('images/product_images/medium') }}/no-image.png" alt="" />
                            @endif
                        </div>
                        <p class="product_title"><strong> {{ $product['product_name'] }}</strong></p>
                        <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}" class="btn btn-info mb-3 text-center btn-sm">Details</a>
                    </div>
                </a>
            </div>
            @endforeach
            <!-- forelse end -->

        </div>
    </div>
</div>
<!-- Product Part End -->

<!-- Product Part Start -->
@foreach ($categorys as $category)


<div id="product_part">
    <div class="container animated fadeInRight">
        <div class="row">
            <div class="col-12">
                <div class="test-title text-center">
                    <h3 class="">{{ $category['category_name'] }}</h3>
                    <img src="{{ asset('front2') }}/images/line2.png" alt="">
                </div>
            </div>
        </div>

        <div class="row text-center">
            <!-- forelse start -->
            @foreach ($category['subcategories'] as $subcategory)
                    @php
                        $products = Product::where(['category_id' => $subcategory['id']])->where('product_one', 'Phone')->where('is_featured', 'Yes')->latest()->limit(4)->get();
                    @endphp

                    @foreach ($products as $product)
                        @if($loop->iteration < 4)

                            <div class="col-lg-3 col-md-3 col-sm-4 col-6  animated fadeInRight">
                                <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}">
                                    <div class="product_full">
                                        <div class="product_img">
                                            @php
                                                $product_image_path = 'images/product_images/medium/'.$product['product_main_image']
                                            @endphp
                                        @if (!empty($product['product_main_image'])&&file_exists($product_image_path))
                                        <img class="img-fluid" src="{{ asset('images/product_images/medium') }}/{{ $product['product_main_image'] }}" alt="" />
                                        @else
                                        <img class="img-fluid" src="{{ asset('images/product_images/medium') }}/no-image.png" alt="" />
                                        @endif
                                        </div>
                                        <p class="product_title"><strong> {{ $product['product_name'] }}</strong></p>
                                        <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}" class="btn btn-info mb-3 text-center btn-sm">Details</a>
                                    </div>
                                </a>
                            </div>
                        @endif

                    @endforeach


            @endforeach

            <!-- forelse end -->
        </div>

        <div class="row text-center mt-5">
            <div class="col-12">
                <a href="{{ $category['category_url'] }}" class="btn btn-danger">View More</a>
            </div>
        </div>







    </div>
</div>
@endforeach
<!-- Product Part End -->


 <!-- Product Part Start -->
 <div id="product_part">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="test-title text-center">
                    <h3 class="">Laptop</h3>
                    <img src="{{ asset('front2') }}/images/line2.png" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- forelse start -->
            @foreach ($laptopProducts as $product)
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 text-center animated fadeInLeft">
                <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}">
                    <div class="product_full">
                        <div class="product_img">
                            @php
                                    $product_image_path = 'images/product_images/medium/'.$product['product_main_image']
                                @endphp
                            @if (!empty($product['product_main_image'])&&file_exists($product_image_path))
                            <img class="img-fluid" src="{{ asset('images/product_images/medium') }}/{{ $product['product_main_image'] }}" alt="" />
                            @else
                            <img class="img-fluid" src="{{ asset('images/product_images/medium') }}/no-image.png" alt="" />
                            @endif
                        </div>
                        <p class="product_title"><strong>{{ $product['product_name'] }}</strong></p>
                        <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}" class="btn btn-danger mb-3 text-center btn-sm">Details</a>
                    </div>
                </a>
            </div>
            @endforeach
            <!-- forelse end -->
        </div>

        <div class="row text-center mt-5">
            <div class="col-12">
                <a href="{{ url('all/laptop007') }}" class="btn btn-danger">View More</a>
            </div>
        </div>


    </div>
</div>
<!-- Product Part End -->






<!-- Product Part Start -->

<div id="product_part">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="test-title text-center">
                    <h3 class="">All Products</h3>
                    <img src="{{ asset('front2') }}/images/line2.png" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- forelse start -->
            @foreach ($newProducts as $product)
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 text-center">
                <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}">
                    <div class="product_full">
                        <div class="product_img">
                            @php
                                $product_image_path = 'images/product_images/medium/'.$product['product_main_image']
                            @endphp
                            @if (!empty($product['product_main_image'])&&file_exists($product_image_path))
                            <img class="img-fluid" src="{{ asset('images/product_images/medium') }}/{{ $product['product_main_image'] }}" alt="" />
                            @else
                            <img class="img-fluid" src="{{ asset('images/product_images/medium') }}/no-image.png" alt="" />
                            @endif
                        </div>
                        <p class="product_title"><strong> {{ $product['product_name'] }}</strong></p>
                        @if (!empty($product['product_old_price']))
                            <p class="selling_price">$ {{ $product['product_old_price'] }}</p>
                        @endif
                        <p class="offer_price">$ {{ $product['product_price'] }}</p>

                        <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}" class="btn btn-danger mb-3 text-center btn-sm">Details</a>
                    </div>
                </a>
            </div>
            @endforeach

            <!-- forelse end -->
        </div>

        <div class="row text-center mt-5">
            <div class="col-12">
                <a href="{{ url('all/product009') }}" class="btn btn-danger">View More</a>
            </div>
        </div>

    </div>
</div>
<!-- Product Part End -->


<!-- contact area start -->
<div class="contact-area mtb-60px">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="test-title text-center">
                    <h3 class="">Contact Information</h3>
                    <img src="{{ asset('front2') }}/images/line2.png" alt="">
                </div>
            </div>
        </div>


        <div class="contact-map mb-10">
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!3m2!1sen!2sbd!4v1611747749697!5m2!1sen!2sbd!6m8!1m7!1sBv1IRnfb-S_25o2WTRMdug!2m2!1d48.86455121179931!2d2.351977023033817!3f105.98606077569316!4f1.3654337517007207!5f0.7820865974627469" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
        </div>
        <div class="custom-row-2">
            <div class="col-lg-4 col-md-5">
                <div class="contact-info-wrap">
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p> <a href="tel:+0987732264">+0987732264</a> </p>
                            {{-- <p>+012 345 678 102</p> --}}
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p><a href="mailto:haquetelecom75@gmail.com">haquetelecom75@gmail.com</a></p>

                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>Address goes here,</p>
                            <p>30 Rue de Turbigo, 75003 Paris, France</p>
                        </div>
                    </div>
                    <div class="contact-social">
                        <h3>Follow Us</h3>
                        <div class="social-info">
                            <ul>
                                @php
                                    $social_fb = App\Social::select('facebook')->where('id',1)->get()->first();
                                    $social_in = App\Social::select('instagram')->where('id',1)->get()->first();
                                @endphp

                               @if ($social_fb != null)
                                    <li>
                                        <a href="{{ $social_fb->facebook }}"><i class="ion-social-facebook"></i></a>
                                    </li>
                               @endif

                               @if ($social_in != null)
                                    <li>
                                        <a href="{{ $social_in->instagram }}"><i class="ion-social-instagram"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="contact-form">
                    <div class="contact-title mb-30">
                        <h2>Get In Touch</h2>
                        @if (Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session::get('success_message') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <form class="contact-form-style" id="contact-form" action="{{ url('customer/contact-us/post') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input name="name" placeholder="Name*" type="text" />
                            </div>
                            <div class="col-lg-6">
                                <input name="email" placeholder="Email*" type="email" />
                            </div>
                            <div class="col-lg-12">
                                <input name="subject" placeholder="Subject*" type="text" />
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Your Message*"></textarea>
                                <button class="submit" type="submit">SEND</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact area end -->

@endsection
