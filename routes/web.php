<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');

Route::prefix('/admin')->namespace('Admin')->group(function () {
    //all the admin routes will define here
    // Route::match(['get','post'],'/', 'AdminController@login');
    Route::get('/admin', 'AdminController@login');
    Route::post('/post', 'AdminController@loginpost');

    Route::get('booking/complete/{id}', 'AdminController@bookingcomplete');
    Route::get('booking/delete/{id}', 'AdminController@bookingdelete');
    Route::get('show-booking', 'AdminController@showBooking');





    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('settings', 'AdminController@settings');
        Route::get('logout', 'AdminController@logout');
        Route::post('check-current-pwd', 'AdminController@chkCurrentPwd');
        Route::post('update-current-pwd', 'AdminController@updateCurrentPwd');
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails');

        // Section
        Route::get('section', 'SectionController@section');
        Route::get('add-section', 'SectionController@addsection');
        Route::post('add-section/post', 'SectionController@addsectionpost');
        Route::post('update-section-status', 'SectionController@updateSectionStatus');

        //Edit Section
        Route::get('edit-section/{section_id}', 'SectionController@EditSection');
        Route::post('edit-section-post', 'SectionController@EditSectionPost');

        Route::get('delete-section/{section_id}', 'SectionController@DeleteSection'); //category delete


        //category
        Route::get('category', 'CategoryController@index');
        Route::get('add-category', 'CategoryController@create');
        Route::post('append-categories-level', 'CategoryController@appendCategoriesLevel');
        Route::post('add-category-post', 'CategoryController@store');

        // edit category
        Route::get('edit-category/{category_id}', 'CategoryController@EditCategory');
        Route::post('edit-category-post', 'CategoryController@EditCategoryPost');

        Route::get('url-edit-category/{category_id}', 'CategoryController@URLEditCategory'); //url edit view
        Route::post('url-edit-category-post', 'CategoryController@URLEditCategoryPost'); //url edit post

        Route::get('description-edit-category/{category_id}', 'CategoryController@DescriptionEditCategory'); //description edit view
        Route::post('description-edit-category-post', 'CategoryController@DescriptionEditCategoryPost'); //description edit post

        Route::get('meta-edit-category/{category_id}', 'CategoryController@MetaEditCategory'); //meta edit view
        Route::post('meta-edit-category-post', 'CategoryController@MetaEditCategoryPost'); //meta edit post

        Route::post('update-category-status', 'CategoryController@updateCategoryStatus'); //category status

        Route::get('delete-category-image/{category_id}', 'CategoryController@DeleteCategoryImage'); //category image delete
        Route::get('delete-category/{category_id}', 'CategoryController@DeleteCategory'); //category delete

        //Product
        Route::get('product', 'ProductController@index');
        Route::get('add-product', 'ProductController@create');
        Route::post('add-product-post', 'ProductController@store');

        // edit product
        Route::get('edit-product/{product_id}', 'ProductController@EditProduct');
        Route::post('edit-product-post', 'ProductController@EditProductPost');

        Route::get('description-edit-product/{product_id}', 'ProductController@DescriptionEditProduct'); //description edit view
        Route::post('description-edit-product-post', 'ProductController@DescriptionEditProductPost'); //description edit post

        Route::get('url-edit-product/{product_id}', 'ProductController@URLEditProduct'); //url edit view
        Route::post('url-edit-product-post', 'ProductController@URLEditProductPost'); //url edit post

        Route::get('meta-edit-product/{product_id}', 'ProductController@MetaEditProduct'); //meta edit view
        Route::post('meta-edit-product-post', 'ProductController@MetaEditProductPost'); //meta edit post
        Route::post('meta-edit-tag-post', 'ProductController@MetaEditTagPost'); //meta tag edit post

        Route::post('update-product-status', 'ProductController@updateProductStatus'); //category status

        Route::get('delete-product-image/{product_id}', 'ProductController@DeleteProductImage'); //product image delete
        Route::get('delete-product-video/{product_id}', 'ProductController@DeleteProductVideo'); //product video delete
        Route::get('delete-product/{product_id}', 'ProductController@DeleteProduct'); //product delete

        //Attribute
        Route::get('add-attributes/{product_id?}', 'ProductController@AddAttributes');
        Route::post('add-attributes-post/{product_id?}', 'ProductController@AddAttributesPost');
        Route::post('edit-attributes/{product_id}', 'ProductController@EditAttributes');

        Route::get('update-attribute-status/{attribute_id}', 'ProductController@updateAttributeStatus');
        Route::get('delete-attribute/{id}', 'ProductController@DeleteAttribute');

        //Detail
        Route::get('add-details/{product_id?}', 'ProductController@AddDetails');
        Route::post('add-details-post/{product_id?}', 'ProductController@AddDetailsPost');
        Route::post('edit-details/{product_id}', 'ProductController@EditDetails');

        Route::get('update-detail-status/{detail_id}', 'ProductController@updateDetailStatus');
        Route::get('delete-detail/{id}', 'ProductController@DeleteDetail');

        //Product Images
        Route::get('add-images/{product_id?}', 'ProductController@AddImages');
        Route::post('add-images-post/{product_id?}', 'ProductController@AddImagesPost');

        Route::get('update-image-status/{image_id}', 'ProductController@updateImageStatus');
        Route::get('delete-image/{id}', 'ProductController@DeleteImage');


        // Banner
        Route::get('banner', 'BannerController@index');
        Route::get('add-banner', 'BannerController@create');
        Route::post('add-banner-post', 'BannerController@store');

        // edit Banner
        Route::get('edit-banner/{blog_id}', 'BannerController@EditBanner');
        Route::post('edit-banner-post', 'BannerController@EditBannerPost');

        Route::post('update-banner-status', 'BannerController@updateBannerStatus'); //Blog status

        Route::get('delete-banner-image/{blog_id}', 'BannerController@DeleteBannerImage'); //Blog image delete
        Route::get('delete-short-banner-image/{blog_id}', 'BannerController@DeleteShortBannerImage'); //Blog image delete
        Route::get('delete-banner/{blog_id}', 'BannerController@DeleteBanner'); //Blog delete

        Route::get('url-edit-banner/{blog_id}', 'BannerController@URLEditBanner'); //url edit view
        Route::post('url-edit-banner-post', 'BannerController@URLEditBannerPost'); //url edit post

        Route::get('meta-edit-banner/{blog_id}', 'BannerController@MetaEditBanner'); //meta edit view
        Route::post('meta-edit-banner-post', 'BannerController@MetaEditBannerPost'); //meta edit post

        // User
        Route::get('new/user', 'UserController@newUser');

        // Contact
        Route::get('conatct/message', 'ContactController@newContactMessage');
        Route::get('new/message/detail/{contact_id}', 'ContactController@newMessageDetail');
        Route::get('delete-contact/{contact_id}', 'ContactController@DeleteContact'); //contact message delete

        // social
        Route::get('social/link/{social_id}', 'SocialController@EditSocial');
        Route::post('edit-social-post', 'SocialController@EditSocialPost');

    });
});

Route::namespace('Front')->group(function () {

    Route::get('{url}/category', 'IndexController@categoryListing');

    Route::get('all/laptop007', 'IndexController@allLaptop');
    Route::get('all/product009', 'IndexController@allProduct');



    Route::get('/', 'IndexController@index');
    Route::get('search/search', 'IndexController@search');

    // listing Categories Route
    Route::get('/{url}', 'ProductsController@listing');
    Route::post('/{url}', 'ProductsController@listing');
    // listing Categories Route
    Route::get('/{url}/tag', 'ProductsController@listingTag');


    //single Product Details Route
    Route::get('{url}/product/{id}', 'ProductsController@detail');
    Route::post('review/post', 'ProductsController@ReviewPost');

    Route::post('{url}/product/get-product-price', 'ProductsController@getProductPrice');

    Route::post('cart/add-to-cart', 'CartController@addToCart');

    // contact us
    Route::get('customer/contact-us', 'ContactController@contact');
    Route::post('customer/contact-us/post', 'ContactController@contactPost');

    // Booking
    Route::post('customer/booking/post' , 'BookingController@bookingpost');
    Route::get('customer/my-booking' , 'BookingController@myBooking');

    // About us
    Route::get('customer/about-us', 'AboutController@about');

    //Customer
    Route::get('customer/home', 'CustomerController@customerHome');
    Route::get('customer/order', 'CustomerController@customerOrder');
    Route::get('customer/invoice/download/{order_id}', 'CustomerController@customerInvoice');

});
