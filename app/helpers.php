<?php

function count_cart(){
    return App\Cart::where('cart_id',Cookie::get('cartId'))->orWhere('user_id',Auth::id())->count();
}

function review_customer_count($product_id){
    return App\Order_detail::where('product_id',$product_id)->whereNotNull('stars')->count();
    // echo $product_id;
}
function avrage_stars($product_id){
    $count_amount = App\Order_detail::where('product_id',$product_id)->whereNotNull('stars')->count();
    $sum_amount = App\Order_detail::where('product_id',$product_id)->whereNotNull('stars')->sum('stars');
    if ($sum_amount==0) {
        return 0;
    }else {
        return round($sum_amount / $count_amount);
    }
    // echo $product_id;
}

// function cart_item(){
//      return App\Cart::where('cart_id',Cookie::get('cartId'))->get();
// }

// function product_attrabute_cart(){
//     return App\Product_attribute::get();
// }

// function new_order_count(){
//     return App\Order::where('order_status',0)->count();
//     // echo $product_id;
// }

function alert_product_count(){
    // return App\Product::where('product_quantity','<=','alert_quantity')->count();
    return DB::table('products')->whereRaw('product_quantity <= alert_quantity')->count();
}


function facebook(){
    $social = App\Social::select('facebook')->where('id',1)->get()->first();
    return $social->facebook;
}
function twitter(){
    $social = App\Social::select('twitter')->where('id',1)->get()->first();
    return $social->twitter;
}

function youtube(){
    $social = App\Social::select('youtube')->where('id',1)->get()->first();
    return $social->youtube;
}

function google(){
    $social = App\Social::select('google')->where('id',1)->get()->first();
    return $social->google;
}

function instagram(){
    $social = App\Social::select('instagram')->where('id',1)->get()->first();
    return $social->instagram;
}
