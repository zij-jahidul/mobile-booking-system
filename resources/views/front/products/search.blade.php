{{-- @php
    error_reporting(0);
@endphp --}}
@extends('layouts.front_layout.front_layout')

@section('content')
<!-- Breadcrumb Area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">{{ $search_name['filter']['product_name'] }}</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>{{ $search_name['filter']['product_name'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<div id="product_part">
    <div class="container">
        <div class="row text-center">
            <!-- forelse start -->
            @foreach ($search_results as $product)


            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}">
                    <div class="product_full">
                        <div class="product_img">
                            {{-- <img src="images/product1.png" alt="Product-One" class="img-fluid"> --}}
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
                        <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}" class="btn btn-danger mb-3 text-center btn-sm">Details</a>
                    </div>
                </a>
            </div>
            @endforeach
            <!-- forelse end -->





        </div>
    </div>
</div>
@endsection
