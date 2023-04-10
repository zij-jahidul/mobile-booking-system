@extends('layouts.front_layout.front_layout')

@section('content')
 <!-- Category Part Start -->
 <!-- Breadcrumb Area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>{{ $categoryname->category_name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

 <div id="category_part">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="test-title text-center">
                    <h3 class="">RÉPARATION {{ $categoryname->category_name }}</h3>
                    <img src="images/line2.png" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- forelse start -->
            @foreach ($categoryProducts as $categoryProduct)

            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-5">
                <a href="{{ url($categoryProduct['category_url']) }}">
                    <div class="brand_full">

                        <div class="brand_img">
                            {{-- <img src="images/cat_iphone.png" alt="Brand-One" class="img-fluid"> --}}
                            @php
                                $product_image_path = 'images/category_images/'.$categoryProduct['category_image']
                            @endphp
                            @if (!empty($categoryProduct['category_image'])&&file_exists($product_image_path))
                            <img class="img-fluid" src="{{ asset('images/category_images') }}/{{ $categoryProduct['category_image'] }}" alt="" />
                            @else
                            <img class="img-fluid" src="{{ asset('images/category_images') }}/no-image.png" alt="" />
                            @endif

                            <i class="fas fa-share share_icon_middle"></i>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach




        </div>
    </div>
</div>
<!-- Brand Part End -->
@endsection
