<div id="shop-1" class="tab-pane active">
    <div class="row">
        @foreach ($categoryProducts as $product)

        <div class="col-xl-3 col-md-4 col-sm-6">
            <article class="list-product">
                <div class="img-block">
                    <a href="{{ url($product['product_url'].'/product/'.$product['id']) }}" class="thumbnail">
                        @php
                            $product_image_path = 'images/product_images/medium/'.$product['product_main_image']
                        @endphp
                        @if (!empty($product['product_main_image'])&&file_exists($product_image_path))
                        <img class="first-img" src="{{ asset('images/product_images/medium') }}/{{ $product['product_main_image'] }}" alt="" />
                        @else
                        <img class="first-img" src="{{ asset('images/product_images/medium') }}/no-image.png" alt="" />
                        @endif
                        {{-- <img class="second-img" src="assets/images/product-image/organic/product-1.jpg" alt="" /> --}}
                    </a>
                    <div class="quick-view">
                        <a class="quick_view" href="{{ url($product['product_url'].'/product/'.$product['id']) }}" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <ul class="product-flag">
                    {{-- <li class="new">New</li> --}}
                </ul>
                <div class="product-decs">
                    <a class="inner-link" href="{{ url($product['product_url'].'/product/'.$product['id']) }}"><span>STUDIO DESIGN</span></a>
                    <h2><a href="{{ url($product['product_url'].'/product/'.$product['id']) }}" class="product-link">{{ \Illuminate\Support\Str::limit($product['product_name'], 40) }}</a></h2>
                    <div class="rating-product">
                        @if (avrage_stars($product['id']) == 0)
                        <i>No Review Yet</i>
                        @else
                        @for ($i = 1; $i <= avrage_stars($product['id']); $i++)
                        <i class="ion-android-star"></i>
                        @endfor
                        @endif
                    </div>
                    <div class="pricing-meta">
                        <ul>
                            @if (!empty($product['product_old_price']))
                            <li class="old-price">€{{ $product['product_old_price'] }}</li>
                            @endif
                            <li class="current-price">€{{ $product['product_price'] }}</li>
                            @if (!empty($product['product_discount']))
                            <li class="discount-price">-{{ $product['product_discount'] }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="add-to-link">
                    <ul>
                        <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                        {{-- <li>
                            <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                        </li>
                        <li>
                            <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                        </li> --}}
                    </ul>
                </div>
            </article>
        </div>
        @endforeach

    </div>
</div>
