@extends('layouts.front_layout.front_layout')


{{-- SEO META TAG  --}}
@section('title')
@if (!empty($productDetails['meta_title']))
{{ $productDetails['meta_title'] }}
@else
{{ $productDetails['product_name'] }}
@endif
@endsection

@section('meta_keyword')
@if (!empty($productDetails['meta_keywords']))
{{ $productDetails['meta_keywords'] }}
@else
{{ $productDetails['product_name'] }}
@endif
@endsection

@section('meta_description')
@if (!empty($productDetails['meta_description']))
{{ $productDetails['meta_description'] }}
@else
{{ $productDetails['product_name'] }}
@endif
@endsection
{{-- SEO META TAG END --}}


{{-- social meta  --}}
@section('social_meta')
<meta property="og:site_name" content="Scotch">
<meta property="og:url" content="https://scotch.io">
<meta property="og:type" content="website">
{{-- /* or this depending content type */ --}}
<meta property="og:type" content="article">
<meta property="og:title" content="Scotch Web Development">
<meta property="og:description" content="Scotch is a web development blog discussing all things programming, development, web, and life.">
<meta property="og:image" content="https://scotch.io/wp-content/themes/scotch/img/scotch-home.jpg">
<meta property="fb:app_id" content="1389892087910588">
<meta property="fb:admins" content="579622216,709634581">
@endsection



@section('style')
<style>
.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 3vw;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}
</style>
@endsection



@section('content')

<!-- Breadcrumb Area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">{{ $productDetails['product_name'] }}</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>{{ $productDetails['product_name'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<!-- Product Part Start -->
<div id="productdetails_part">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="test-title text-center">
                    <h3 class="">Product Details</h3>
                    <img src="images/line2.png" alt="">
                </div>
            </div>
        </div>

        @if(session()->has('success_status')) 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_status') }}           
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif      


        <div class="row">
            
            <!-- forelse start -->
            <div class="col-lg-4 col-md-8 col-sm-6 col-12">
                <div class="product_img">
                    <img src="{{ asset('images') }}/product_images/large/{{ $productDetails['product_main_image'] }}" alt="Product-One" class="img-fluid mb-5">
                </div>

                <div class="productdetails">
                    <p>Product ID:{{ $productDetails['id'] }}</p>
                    <p>Product Name: {{ $productDetails['product_name'] }}</p>
                    <p>Product Description:
                        @php
                        echo html_entity_decode($productDetails['product_short_description']);
                        @endphp</p>
                    <p>Product Price: {{  $productDetails['product_price']  }}</p>
                </div>

                <button type="button" class="btn btn-info mt-3 mb-3" data-toggle="modal" data-target="#exampleModalCenterTwo">
                    Details View
                </button>

                <div class="modal fade" id="exampleModalCenterTwo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Product Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <form action="" method="POST">
                        <!-- @csrf -->
                        <div class="modal-body">

                            <div class="details px-2">
                                <ul>
                                    @foreach ($productDetails['attributes'] as $item)

                                    <li class=""> <span class="span_name">{{ $item['size'] }}</span> <span class="span_price text-right"> {{ $item['price'] }} </span> </li>
                                    @endforeach

            {{-- <li class=""> <span class="span_name">Model </span> <span class="span_price text-right">Galaxy M01</span> </li>
            <li class=""> <span class="span_name">Display Size</span> <span class="span_price text-right">5.7</span> </li>
            <li class=""> <span class="span_name">RAM </span> <span class="span_price text-right">3GB</span> </li>
            <li class=""> <span class="span_name">ROM </span> <span class="span_price text-right">128GB</span> </li>
            <li class=""> <span class="span_name">Processor </span> <span class="span_price text-right">Octa-Core</span> </li>
            <li class=""> <span class="span_name">Memory Support</span> <span class="span_price text-right">512GB</span> </li>
            <li class=""> <span class="span_name">Camera </span> <span class="span_price text-right">13MP/8MP</span> </li>
            <li class=""> <span class="span_name">GPU </span> <span class="span_price text-right">2GHz</span> </li>
            <li class=""> <span class="span_name">Battery </span> <span class="span_price text-right">4000</span> </li>
            <li class=""> <span class="span_name">Warranty </span> <span class="span_price text-right">2 Years</span> </li>
            <li class=""> <span class="span_name">Warranty </span> <span class="span_price text-right">2 Years</span> </li>
            <li class=""> <span class="span_name">Warranty </span> <span class="span_price text-right">2 Years</span> </li> --}}

                                </ul>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                <div class="details_right mt-5">
                    <ul>
                        @foreach ($productDetails['details'] as $item)
                         <li class=""><i class="{{ $item['icon'] }}"></i> <span class="span_name">{{ $item['name'] }}</span> <span class="span_price text-right">{{ $item['price'] }} €</span> </li>
                        @endforeach

                    </ul>

                    {{-- @auth --}}
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                            Booking Now
                        </button>
                    {{-- @endauth --}}

                    {{-- @guest --}}
                        {{-- <a href="{{ url('login') }}" class="btn btn-sm btn-info">Please Login First for Booking</a> --}}
                    {{-- @endguest --}}
                    
                </div>
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Booking Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>


                    <form action="{{ url('customer/booking/post') }}" method="POST" enctype="multipart/form-data">
                        <!-- @csrf -->
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Full Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name" name="name">
                                        @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone Number" name="phone">
                                        @error('phone')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Device Problems</label>
                                <textarea class="form-control" rows="2" placeholder="Device Problems" name="problems"></textarea>
                                @error('problems')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image Upload (Optional)</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="image">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>





                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Booking Submit</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>

            </div>

            <!-- forelse end -->
        </div>
    </div>
</div>
<!-- Product Part End -->
@endsection
