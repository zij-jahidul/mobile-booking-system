{{-- @php
    error_reporting(0);
@endphp --}}
@extends('layouts.front_layout.front_layout')

{{-- SEO META TAG  --}}
@section('title')
@if (!empty($tagDetails['tagDetails']['meta_title']))
{{ $tagDetails['tagDetails']['meta_title'] }}
@else
{{ $tagDetails['tagDetails']['tag_name'] }}
@endif
@endsection

@section('meta_keyword')
@if (!empty($tagDetails['tagDetails']['meta_keywords']))
{{ $tagDetails['tagDetails']['meta_keywords'] }}
@else
{{ $tagDetails['tagDetails']['tag_name'] }}
@endif
@endsection

@section('meta_description')
@if (!empty($tagDetails['tagDetails']['meta_description']))
{{ $tagDetails['tagDetails']['meta_description'] }}
@else
{{ $tagDetails['tagDetails']['tag_name'] }}
@endif
@endsection
{{-- SEO META TAG END --}}

@section('content')
<!-- Breadcrumb Area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">{{ $tagDetails['tagDetails']['tag_name'] }}</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>{{ $tagDetails['tagDetails']['tag_name'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<!-- Shop Category Area End -->
<div class="shop-category-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar">
                    <!-- Left Side start -->
                    <div class="shop-tab nav mb-res-sm-15">
                        <a class="active" href="#shop-1" data-toggle="tab">
                            <i class="fa fa-th show_grid"></i>
                        </a>
                        <a href="#shop-2" data-toggle="tab">
                            <i class="fa fa-list-ul"></i>
                        </a>
                        <p>There Are {{ count($tagProducts) }} Products.</p>
                    </div>
                    <!-- Left Side End -->
                    <!-- Right Side Start -->
                    {{-- <div class="select-shoing-wrap">
                        <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <div class="shop-select">
                            <form name="sortProductsTag" id="sortProductsTag">
                                <select name="sortTag" id="sortTag">
                                    <option value="">Select</option>

                                    <option value="product_latest"
                                        @if (isset($_GET['sortTag'])&& $_GET['sortTag']=='product_latest')
                                        selected
                                        @endif
                                    >Sort by newness</option>

                                    <option value="product_name_a_z"
                                        @if (isset($_GET['sortTag'])&& $_GET['sortTag']=='product_name_a_z')
                                        selected
                                        @endif
                                    >A to Z</option>

                                    <option value="product_name_z_a"
                                        @if (isset($_GET['sortTag'])&& $_GET['sortTag']=='product_name_z_a')
                                        selected
                                        @endif
                                    > Z to A</option>

                                    <option value="price_lowest"
                                        @if (isset($_GET['sortTag'])&& $_GET['sortTag']=='price_lowest')
                                        selected
                                        @endif
                                    >Lowest Price First</option>

                                    <option value="price_highest"
                                        @if (isset($_GET['sortTag'])&& $_GET['sortTag']=='price_highest')
                                        selected
                                        @endif
                                    >Highest Price First</option>
                                </select>
                            </form>
                        </div>
                    </div> --}}
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->

                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area mt-35">
                    <!-- Shop Tab Content Start -->
                    <div class="tab-content jump">
                        <!-- Tab One Start -->
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                @foreach ($tagProducts as $product)
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <article class="list-product">
                                        <div class="img-block">
                                            <a href="{{ url($product['product']['product_url'].'/product/'.$product['product']['id']) }}" class="thumbnail">
                                                @php
                                                    $product_image_path = 'images/product_images/small/'.$product['product']['product_main_image']
                                                @endphp
                                                @if (!empty($product['product']['product_main_image'])&&file_exists($product_image_path))
                                                <img class="first-img" src="{{ asset('images/product_images/medium') }}/{{ $product['product']['product_main_image'] }}" alt="" />
                                                @else
                                                <img class="first-img" src="{{ asset('images/product_images/small') }}/no-image.png" alt="" />
                                                @endif
                                                {{-- <img class="second-img" src="assets/images/product-image/organic/product-1.jpg" alt="" /> --}}
                                            </a>
                                            <div class="quick-view">
                                                <a class="quick_view" href="{{ url($product['product']['product_url'].'/product/'.$product['product']['id']) }}" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="ion-ios-search-strong"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="product-flag">
                                            <li class="new">New</li>
                                        </ul>
                                        <div class="product-decs">
                                            <a class="inner-link" href="{{ url($product['product']['product_url'].'/product/'.$product['product']['id']) }}"><span>STUDIO DESIGN</span></a>
                                            <h2><a href="{{ url($product['product']['product_url'].'/product/'.$product['product']['id']) }}" class="product-link">{{ \Illuminate\Support\Str::limit($product['product']['product_name'], 40) }}</a></h2>
                                            <div class="rating-product">
                                                @if (avrage_stars($product['product']['id']) == 0)
                                                <i>No Review Yet</i>
                                                @else
                                                @for ($i = 1; $i <= avrage_stars($product['product']['id']); $i++)
                                                <i class="ion-android-star"></i>
                                                @endfor
                                                @endif
                                            </div>
                                            <div class="pricing-meta">
                                                <ul>
                                                    @if (!empty($product['product_old_price']))
                                                    <li class="old-price">€{{ $product['product']['product_old_price'] }}</li>
                                                    @endif
                                                    <li class="current-price">€{{ $product['product']['product_price'] }}</li>
                                                    @if (!empty($product['product_discount']))
                                                    <li class="discount-price">-{{ $product['product']['product_discount'] }}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="add-to-link">
                                            <ul>
                                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                                <li>
                                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                                                </li>
                                                <li>
                                                    <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- Tab One End -->
                        <!-- Tab Two Start -->

                        <div id="shop-2" class="tab-pane">
                            @foreach ($tagProducts as $product)
                            <div class="shop-list-wrap mb-30px scroll-zoom">
                                <div class="row list-product m-0px">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                <div class="left-img">
                                                    <div class="img-block">
                                                        <a href="{{ url($product['product']['product_url'].'/product/'.$product['product']['id']) }}" class="thumbnail">
                                                            @php
                                                                $product_image_path = 'images/product_images/small/'.$product['product']['product_main_image']
                                                            @endphp
                                                            @if (!empty($product['product']['product_main_image'])&&file_exists($product_image_path))
                                                            <img class="first-img" src="{{ asset('images/product_images/medium') }}/{{ $product['product']['product_main_image'] }}" alt="" />
                                                            @else
                                                            <img class="first-img" src="{{ asset('images/product_images/small') }}/no-image.png" alt="" />
                                                            @endif
                                                            {{-- <img class="second-img" src="assets/images/product-image/organic/product-8.jpg" alt="" /> --}}
                                                        </a>
                                                        <div class="quick-view">
                                                            <a class="quick_view" href="{{ url($product['product']['product_url'].'/product/'.$product['product']['id']) }}" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                                <i class="ion-ios-search-strong"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="product-flag">
                                                        <li class="new">New</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <div class="product-desc-wrap">
                                                    <div class="product-decs">
                                                        <a class="inner-link" href="{{ url($product['product']['product_url'].'/product/'.$product['product']['id']) }}"><span>GRAPHIC CORNER</span></a>
                                                        <h2><a href="{{ url($product['product']['product_url'].'/product/'.$product['product']['id']) }}" class="product-link">{{ \Illuminate\Support\Str::limit($product['product']['product_name'], 40) }}</a></h2>
                                                        <div class="rating-product">
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                        </div>
                                                        <div class="pricing-meta">
                                                            <ul>
                                                                @if (!empty($product['product']['product_old_price']))
                                                                <li class="old-price">€{{ $product['product']['product_old_price'] }}</li>
                                                                @endif
                                                                <li class="current-price">€{{ $product['product']['product_price'] }}</li>
                                                                @if (!empty($product['product_discount']))
                                                                <li class="discount-price">-{{ $product['product']['product_discount'] }}</li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div class="product-intro-info">
                                                            <p>
                                                                @php
                                                                echo html_entity_decode($product['product']['product_long_description']);
                                                                @endphp
                                                            </p>

                                                        </div>
                                                        <div class="in-stock">Availability: <span>299 In Stock</span></div>
                                                    </div>
                                                    <div class="add-to-link">
                                                        <ul>
                                                            <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                                            <li>
                                                                <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Tab Two End -->
                    </div>
                    <!-- Shop Tab Content End -->
                    <!--  Pagination Area Start -->
                    {{-- <div class="pro-pagination-style text-center">
                        <ul>
                            <li>
                                <a class="prev" href="#"><i class="ion-ios-arrow-left"></i></a>
                            </li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li>
                                <a class="next" href="#"><i class="ion-ios-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div> --}}
                    <div>
                        {{ $tagProducts->links() }}
                    </div>

                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
        </div>
    </div>
</div>
<!-- Shop Category Area End -->
@endsection
