<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{

    public function index()
    {
        $categorys = Category::with('subcategories')->where('parent_id', 0)->where('status', 1)->get()->toArray();
        // $products = Product::with('category')->where('is_featured', 'No')->limit(4)->inRandomOrder()->get()->toArray();
        $laptopProducts = Product::where('product_one', 'Laptop')->where('status', 1)->where('is_featured', 'No')->limit(8)->inRandomOrder()->get()->toArray();
        $categoryBrandItems = Category::where('status', 1)->where('parent_id', 0)->inRandomOrder()->get()->toArray();

        // get new product
        $newProducts = Product::with(['category', 'section'])->orderBy('id', 'Desc')->where('status', 1)->where('is_featured', 'Yes')->limit(8)->inRandomOrder()->get()->toArray();
        $allServices = Product::with(['category', 'section'])->orderBy('id', 'Desc')->where('status', 1)->where('is_featured', 'Yes')->limit(8)->inRandomOrder()->get()->toArray();

        $page_name = 'index';
        return view('front.index', [
            'page_name' => $page_name,
            'newProducts' => $newProducts,
            'categoryBrandItems' => $categoryBrandItems,
            'categorys' => $categorys,
            // 'products' => $products,
            'laptopProducts' => $laptopProducts,
            'allServices' => $allServices,
        ]);
    }

    public function search(Request $request)
    {
        $search_name = $request->all();

        $search_results = QueryBuilder::for(Product::class)
            ->allowedFilters(['product_name'])->where('is_featured', 'No')->get();

        return view('front.products.search', [
            'search_results' => $search_results,
            'search_name' => $search_name,
        ]);
    }


    public function categoryListing($url)
    {
        $categoryname = Category::where('category_url', $url)->firstOrFail();
        $categoryProducts = Category::where('category_url', $url)->firstOrFail();
        $categoryProducts = Category::where('parent_id', $categoryProducts->id)->get();
        // echo '<pre>';
        // dd($categoryname);
        // die;
        return view('front.category.sub_category', [
            'categoryProducts' => $categoryProducts,
            'categoryname' => $categoryname,

        ]);
    }

    public function allLaptop()
    {
        $laptopProducts = Product::where('product_one', 'Laptop')->where('status', 1)->where('is_featured', 'No')->limit(8)->inRandomOrder()->get()->toArray();
        return view('front.products.alllaptop', compact('laptopProducts'));
    }

    public function allProduct()
    {
        $allProducts = Product::with(['category', 'section'])->orderBy('id', 'Desc')->where('status', 1)->where('is_featured', 'Yes')->limit(8)->inRandomOrder()->get()->toArray();
        return view('front.products.allproducts', compact('allProducts'));
    }
}
