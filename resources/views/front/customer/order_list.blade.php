@extends('layouts.front_layout.front_layout')

@section('content')
<!-- Breadcrumb Area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Wishlist Page</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="index.html">Home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<!-- cart area start -->
<div class="cart-main-area mtb-60px">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>SL.NO</th>
                                    <th>Sub total</th>
                                    <th>Discount Amount	</th>
                                    <th>Coupon Name</th>
                                    <th>Total</th>
                                    <th>Payment Option</th>
                                    <th>Payment Status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <thead>
                                <tr>
                                    <th>{{ $loop->index+1 }}</th>
                                    <th>${{ $order->sub_total }}</th>
                                    <th>${{ $order->discount_amount }}</th>
                                    <th>{{ $order->coupon_name }}</th>
                                    <th>${{ $order->total }}</th>
                                    <th>
                                        @if ($order->payment_option==1)
                                            Cash on Delivary
                                        @else
                                            Card
                                        @endif

                                    </th>
                                    <th>
                                        @if ($order->payment_status==1)
                                            <span class="badge badge-danger">Unpaid</span>
                                        @else
                                            <span class="badge badge-success">Paid</span>
                                        @endif

                                    </th>
                                    <th>{{ $order->created_at }}</th>
                                    <th class="product-wishlist-cart">
                                        <a href="{{ url('customer/invoice/download') }}/{{ $order->id }}"><i class="fa fa-download"></i>Invoice</a>
                                    </th>
                                </tr>
                            </thead>
                                <tr>
                                    <thead>
                                    <tr>
                                        <th>SL.NO</th>
                                        <th>product Name</th>
                                        <th>size</th>
                                        <th>product_quantity</th>
                                        <th>product_price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                    @foreach ($order->order_detail as $order_detail)

                                    <tr>

                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $order_detail->product->product_name }}</td>
                                        <td>{{ $order_detail->size }}</td>
                                        <td>{{ $order_detail->product_quantity }}</td>
                                        <td>${{ $order_detail->product_price }}</td>
                                        <td></td>


                                    </tr>
                                    @endforeach

                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- cart area end -->
@endsection
