<?php

namespace App\Http\Controllers\Front;

use App\Category;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Product;
use App\Product_attribute;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function listing($url, Request $request){
        $categoryname = Category::where('category_url', $url)->firstOrFail();

        Paginator::useBootstrap();

        if ($request->ajax()) {
            $data = $request->all();
            $url = $data['url'];


            $categoryCount = Category::where(['category_url'=>$url,'status'=>1])->count();
            if ($categoryCount>0) {
                $categoryDetails = Category::catDetails($url);
              
                $categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);

                // If product_one filter is selected
                if (isset($data['product_one']) && !empty($data['product_one'])) {
                    $categoryProducts->whereIn('products.product_one',$data['product_one']);
                }

                // If product_two filter is selected
                if (isset($data['product_two']) && !empty($data['product_two'])) {
                    $categoryProducts->whereIn('products.product_two',$data['product_two']);
                }

                // If product_three filter is selected
                if (isset($data['product_three']) && !empty($data['product_three'])) {
                    $categoryProducts->whereIn('products.product_three',$data['product_three']);
                }

                // If product_four filter is selected
                if (isset($data['product_four']) && !empty($data['product_four'])) {
                    $categoryProducts->whereIn('products.product_four',$data['product_four']);
                }

                // If product_five filter is selected
                if (isset($data['product_five']) && !empty($data['product_five'])) {
                    $categoryProducts->whereIn('products.product_five',$data['product_five']);
                }

                // If product_six filter is selected
                if (isset($data['product_six']) && !empty($data['product_six'])) {
                    $categoryProducts->whereIn('products.product_six',$data['product_six']);
                }

                // If Sort Option Selected By User
                if (isset($data['sort']) && !empty($data['sort'])) {
                    if ($data['sort']=='product_latest') {
                        $categoryProducts->orderBy('id','Desc');
                    }
                    else if ($data['sort']=='product_name_a_z') {
                        $categoryProducts->orderBy('product_name','Asc');
                    }
                    else if ($data['sort']=='product_name_z_a') {
                        $categoryProducts->orderBy('product_name','Desc');
                    }
                    else if ($data['sort']=='price_lowest') {
                        $categoryProducts->orderBy('product_price','Asc');
                    }
                    else if ($data['sort']=='price_highest') {
                        $categoryProducts->orderBy('product_price','Desc');
                    }
                    else{
                        $categoryProducts->orderBy('id','Desc');
                    }
                }

                $categoryProducts = $categoryProducts->paginate(80);

                return view('Front.products.ajax_products_listing',[
                    'categoryDetails'=> $categoryDetails,
                    'categoryProducts'=> $categoryProducts,
                    'url'=> $url,
                ]);
            }else{
                abort(404);
            }

        } else {
                $categoryCount = Category::where(['category_url'=>$url,'status'=>1])->count();
            if ($categoryCount>0) {   
                $categoryDetails = Category::catDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
             
                $categoryProducts = $categoryProducts->paginate(28);

                $productFilters = Product::productFilters();
                $product_oneArray = $productFilters['product_oneArray'];
                $product_twoArray = $productFilters['product_twoArray'];
                $product_threeArray = $productFilters['product_threeArray'];
                $product_fourArray = $productFilters['product_fourArray'];
                $product_fiveArray = $productFilters['product_fiveArray'];
                $product_sixArray = $productFilters['product_sixArray'];

                $page_name = 'listing';

                return view('front.products.listing',[
                    'categoryDetails'=> $categoryDetails,
                    'categoryProducts'=> $categoryProducts,
                    'url'=> $url,
                    'product_oneArray' => $product_oneArray,
                    'product_twoArray' => $product_twoArray,
                    'product_threeArray' => $product_threeArray,
                    'product_fourArray' => $product_fourArray,
                    'product_fiveArray' => $product_fiveArray,
                    'product_sixArray' => $product_sixArray,
                    'page_name' => $page_name,
                    'categoryname' => $categoryname,
                ]);
            }else{
                abort(404);
            }
        }
    }


    public function detail($url,$id){
        $productDetails = Product::with('category','section','brand','attributes','details','images')->where('product_url', $url)->where('id', $id)->where('status',1)->firstOrFail();
        return view('front.products.detail',[
            'productDetails' => $productDetails,

        ]);
    }




    public function getProductPrice(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo"<pre>";
            // print_r($data);
            // die();
            $getProductPrice = Product_attribute::where(['product_id'=>$data['product_id'],'size'=>$data['size']])->first();
            return $getProductPrice->price;
        }
    }






}
