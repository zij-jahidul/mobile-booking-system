<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Tag;
use App\Brand;
use App\Product;
use App\Section;
use App\Category;
use Carbon\Carbon;
use App\Product_tag;
use App\product_image;
use App\Product_detail;
use App\Product_attribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index()
    {
        // echo '<pre>';
        // $products = Product::with(['category', 'section','attribute'])->get();
        // $products = json_decode(json_encode($products));
        // print_r($products);
        // die();
        return view('admin.product.index', [
            // 'categories' => Category::with(['section', 'parentcategory'])->get()
            'products' => Product::with(['category', 'section', 'attribute'])->orderBy('id', 'desc')->get()
        ]);
    }

    public function create()
    {

        $productFilters = Product::productFilters();
        // echo '<pre>';
        // print_r($productFilters);
        // die();
        $product_oneArray = $productFilters['product_oneArray'];
        $product_twoArray = $productFilters['product_twoArray'];
        $product_threeArray = $productFilters['product_threeArray'];
        $product_fourArray = $productFilters['product_fourArray'];
        $product_fiveArray = $productFilters['product_fiveArray'];
        $product_sixArray = $productFilters['product_sixArray'];

        // Section with Categories and sub Categories
        $categories = Section::with('categories')->get();
        // echo '<pre>';
        // print_r($categories);
        // die();
        $brands = Brand::where('status', 1)->get();
        $brands = json_decode(json_encode($brands), true);
        // echo '<pre>';
        // print_r($brands);
        // die();
        return view('admin.product.create', [
            'sections' => Section::where(['status' => 1])->get(),
            'product_oneArray' => $product_oneArray,
            'product_twoArray' => $product_twoArray,
            'product_threeArray' => $product_threeArray,
            'product_fourArray' => $product_fourArray,
            'product_fiveArray' => $product_fiveArray,
            'product_sixArray' => $product_sixArray,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        // echo '<pre>';
        // // echo $request->category_url;
        // print_r($request->all());
        // die();

        // Category Validation
        $rules = [
            'product_name' => 'required',


            'category_id' => 'required',
            'category_image' => 'unique:categories,category_image',

        ];

        $customMessages = [
            'product_name.required' => 'The Product Name field is required.',


            'category_id.required' => 'The Category field is required.',
            'product_image.unique' => 'Please change the image name.'
        ];

        $this->validate($request, $rules, $customMessages);


        if (empty($request->is_featured)) {
            $is_featured = 'No';
        } else {
            $is_featured = 'Yes';
        }

        if (empty($request->product_url)) {
            $request->product_url = Str::slug($request->product_name . '-' . Str::random(5));
        } else {
            $request->product_url = Str::slug($request->product_name . '-' . Str::random(5));
        }
        // $request->product_url = Str::slug($request->product_name . '-' . Str::random(5));

        $categoryDetails = Category::find($request->category_id);
        // $section_id = $categoryDetails->section_id;
        // echo '<pre>';
        // // echo $request->category_url;
        // print_r($section_id);
        // die();

        $product_id = Product::insertGetId([
            'product_name' => $request->product_name,
            'section_id' => 1,
            'category_id' => $request->category_id,
            'product_price' => $request->product_price,
            'product_old_price' => $request->product_old_price,
            'product_quantity' => 100,
            'alert_quantity' => 1,
            'product_one' => $request->product_one,
            'product_url' => $request->product_url,
            'product_short_description' => htmlentities($request->product_short_description, ENT_QUOTES),
            'is_featured' => $is_featured,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);


        if ($request->hasFile('product_main_image')) {
            $image_tmp = $request->file('product_main_image');
            if ($image_tmp->isValid()) {
                // Get image extension
                $originalname = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                // genarate image name
                $imageName = $originalname . '-' . $product_id . '-' . rand(111, 99999) . '.' . $extension;
                $large_image_path = 'images/product_images/large/' . $imageName;
                $medium_image_path = 'images/product_images/medium/' . $imageName;
                $small_image_path = 'images/product_images/small/' . $imageName;
                //Upload the image
                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(260, 220)->save($medium_image_path);
                Image::make($image_tmp)->resize(260, 220)->save($small_image_path);
                Product::find($product_id)->update([
                    'product_main_image' => $imageName
                ]);
            }
        }
        // Upload Product Video
        if ($request->hasFile('product_video')) {
            $video_tmp = $request->file('product_video');
            if ($video_tmp->isValid()) {
                // Upload video
                $video_name = $video_tmp->getClientOriginalName();
                $extension = $video_tmp->getClientOriginalExtension();
                // genarate image name
                $videoName = $video_name . '-' . $product_id . '-' . rand() . '.' . $extension;
                $video_path = 'videos/product_videos/';
                //Upload the image
                $video_tmp->move($video_path, $videoName);
                // Save Video in table
                Product::find($product_id)->update([
                    'product_video' => $videoName
                ]);
            }
        }

        return back()->with('success_message', $request->product_name . ' product added sucessfully');
    }

    public function EditProduct($product_id)
    {
        // echo 'asddsa';
        // die();
        $product_info = Product::find($product_id);

        $productFilters = Product::productFilters();
        // echo '<pre>';
        // print_r($productFilters);
        // die();
        $product_oneArray = $productFilters['product_oneArray'];
        $product_twoArray = $productFilters['product_twoArray'];
        $product_threeArray = $productFilters['product_threeArray'];
        $product_fourArray = $productFilters['product_fourArray'];
        $product_fiveArray = $productFilters['product_fiveArray'];
        $product_sixArray = $productFilters['product_sixArray'];

        // Section with Categories and sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories), true);
        // echo '<pre>';
        // print_r($categories);
        // die();
        $brands = Brand::where('status', 1)->get();
        $brands = json_decode(json_encode($brands), true);
        // echo '<pre>';
        // print_r($brands);
        // die();

        return view('admin.product.edit', [
            'sections' => Section::where(['status' => 1])->get(),
            'product_oneArray' => $product_oneArray,
            'product_twoArray' => $product_twoArray,
            'product_threeArray' => $product_threeArray,
            'product_fourArray' => $product_fourArray,
            'product_fiveArray' => $product_fiveArray,
            'product_sixArray' => $product_sixArray,
            'categories' => $categories,
            'product_info' => $product_info,
            'brands' => $brands,
        ]);
    }

    public function EditProductPost(Request $request)
    {

        $rules = [
            'product_name' => 'required',
            'category_id' => 'required',
            'category_image' => 'unique:categories,category_image',

        ];

        $customMessages = [
            'product_name.required' => 'The Product Name field is required.',
            'category_id.required' => 'The Category field is required.',
            'product_image.unique' => 'Please change the image name.'
        ];

        if (empty($request->is_featured)) {
            $is_featured = 'No';
        } else {
            $is_featured = 'Yes';
        }

        $this->validate($request, $rules, $customMessages);

        $categoryDetails = Category::find($request->category_id);
        // $section_id = $categoryDetails->section_id;
        // echo '<pre>';
        // print_r($section_id);
        // die();
        //get brand

        Product::find($request->product_id)->update([
            'product_name' => $request->product_name,
            'section_id' => 1,
            'category_id' => $request->category_id,


            'product_price' => $request->product_price,
            'product_old_price' => $request->product_old_price,
            'product_quantity' => 100,
            'alert_quantity' => 1,

            'product_one' => $request->product_one,

            'is_featured' => $is_featured,
        ]);

        if ($request->hasFile('product_main_image')) {
            $image_tmp = $request->file('product_main_image');
            if ($image_tmp->isValid()) {
                // Get image extension
                $originalname = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                // genarate image name
                $imageName = $originalname . '-' . $request->product_id . '-' . rand(111, 99999) . '.' . $extension;
                $large_image_path = 'images/product_images/large/' . $imageName;
                $medium_image_path = 'images/product_images/medium/' . $imageName;
                $small_image_path = 'images/product_images/small/' . $imageName;
                //Upload the image
                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(260, 220)->save($medium_image_path);
                Image::make($image_tmp)->resize(260, 220)->save($small_image_path);
                Product::find($request->product_id)->update([
                    'product_main_image' => $imageName
                ]);
            }
        }

        // Upload Product Video
        if ($request->hasFile('product_video')) {
            $video_tmp = $request->file('product_video');
            if ($video_tmp->isValid()) {
                // Upload video
                $video_name = $video_tmp->getClientOriginalName();
                $extension = $video_tmp->getClientOriginalExtension();
                // genarate image name
                $videoName = $video_name . '-' . $request->product_id . '-' . rand() . '.' . $extension;
                $video_path = 'videos/product_videos/';
                //Upload the image
                $video_tmp->move($video_path, $videoName);
                // Save Video in table
                Product::find($request->product_id)->update([
                    'product_video' => $videoName
                ]);
            }
        }


        return back()->with('success_message', $request->product_name . ' product Updated sucessfully');;
    }

    //delete product Image
    public function DeleteProductImage($product_id)
    {
        //Get product image
        $productImage = Product::select('product_main_image')->where('id', $product_id)->first();

        //Get product Image path
        $large_image_path = 'images/product_images/large/';
        $medium_image_path = 'images/product_images/medium/';
        $small_image_path = 'images/product_images/small/';

        // Delete Product Image from Product_image folder if exists
        if (file_exists($large_image_path . $productImage->product_main_image)) {
            unlink($large_image_path . $productImage->product_main_image);
        }
        if (file_exists($small_image_path . $productImage->product_main_image)) {
            unlink($small_image_path . $productImage->product_main_image);
        }
        if (file_exists($medium_image_path . $productImage->product_main_image)) {
            unlink($medium_image_path . $productImage->product_main_image);
        }

        // delete Product image from product table
        Product::where('id', $product_id)->update(['product_main_image' => '']);
        return back()->with('success_message', ' Product Image Deleted Sucessfully');;
    }

    public function deleteProductVideo($product_id)
    {
        //Get product video
        $productVideo = Product::select('product_video')->where('id', $product_id)->first();

        //Get product Image path
        $video_path = 'videos/product_videos/';


        // Delete Product Image from Product_video folder if exists
        if (file_exists($video_path . $productVideo->product_video)) {
            unlink($video_path . $productVideo->product_video);
        }

        // delete Product video from product table
        Product::where('id', $product_id)->update(['product_video' => '']);
        return back();
    }

    //  Category description edit View
    //  Category description edit-Post View

    public function DescriptionEditProduct($product_id)
    {
        $product_info = Product::find($product_id);
        return view('admin.product.description_edit', [
            'product_info' => $product_info,
        ]);
    }
    public function DescriptionEditProductPost(Request $request)
    {
        // print_r($request->all());
        // die();
        Product::find($request->product_id)->update([
            'product_short_description' => htmlentities($request->product_short_description, ENT_QUOTES),
            'product_long_description' => htmlentities($request->product_long_description, ENT_QUOTES),
        ]);
        return back()->with('success_message', $request->category_name . ' category Description Updated sucessfully');;
    }


    //  Product URL edit View
    //  Product URL edit-Post View

    public function URLEditProduct($product_id)
    {
        $product_info = Product::find($product_id);
        return view('admin.product.url_edit', [
            'product_info' => $product_info,
        ]);
    }
    public function URLEditProductPost(Request $request)
    {

        $rules = [
            'product_url' => 'required|unique:products,product_url,' . $request->product_id,
        ];

        $customMessages = [
            'product_url.required' => 'The Product URL field is required.',
            'product_url.unique' => 'The Product URL is Already Exists.'
        ];

        $this->validate($request, $rules, $customMessages);

        // print_r($request->all());
        // die();
        Product::find($request->product_id)->update([
            'product_url' => Str::slug($request->product_url),
        ]);
        return back()->with('success_message', $request->category_name . ' Product URL Updated sucessfully');;
    }

    //  Product Meta edit View
    //  Product Meta edit-Post View

    public function MetaEditProduct($product_id)
    {

        // echo '<pre>';
        // $products = Product::with(['category', 'tags'])->get();
        // $products = json_decode(json_encode($products));
        // foreach ($products->tags as $tag) {
        //     print_r($tag);
        // }
        // // print_r($products);
        // die();

        // $tagdetail= Tag::get();
        // $tagdetail= json_decode(json_encode($tagdetail));
        // print_r($tagdetail);
        // die();

        $product_info = Product::find($product_id);
        // $product_info = Product::with('tags')->get();
        // $product_info = json_decode(json_encode($product_info), true);
        // echo'<pre>';
        // print_r($product_info);
        // die();
        return view('admin.product.meta_edit', [
            'product_info' => $product_info,
            'tags' => Tag::get(),
        ]);
    }
    public function MetaEditProductPost(Request $request)
    {
        // dd($request->all());
        // die();


        $rules = [
            'meta_keywords' => 'max:255',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
        ];

        $customMessages = [
            // 'category_url.required' => 'The Category URL field is required.',
        ];

        $this->validate($request, $rules, $customMessages);
        // echo'<pre>';
        // print_r($request->all());


        Product::find($request->product_id)->update([
            'meta_keywords' => $request->meta_keywords,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            // 'tags' => $tag_collection,
        ]);

        // $product = Product::find('id');
        // $product->tags()->sync($request->tags);
        // // $product->tags()->sync($request->product_id);



        return back()->with('success_message', $request->product_name . ' Product SEO Updated sucessfully');
    }


    public function MetaEditTagPost(Request $request)
    {

        $rules = [
            'tag_id' => 'required',
        ];

        $customMessages = [
            'tag_id.required' => 'please select tag.',
        ];
        $this->validate($request, $rules, $customMessages);

        Product_tag::where('product_id', $request->product_id)->delete();



        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo '<pre>';
            // print_r($data);
            // // echo $data['product_id'];
            // die();
            foreach ($data['tag_id'] as $key => $value) {
                if (!empty($value)) {
                    $tag = new Product_tag;
                    $tag->product_id = $data['product_id'];
                    $tag->tag_id = $value;
                    $tag->save();
                }
            }
        }
        return back()->with('success_message', 'tag added Successfully!');
    }




    public function updateProductStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo '<pre>';
            // print_r($data);
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Product::where('id', $data['product_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'product_id' => $data['product_id']]);
        }
    }


    public function DeleteProduct($product_id)
    {
        Product::where('id', $product_id)->delete();
        return back()->with('success_message', 'Product deleted Successfully!');
    }

    //product Add Attributes
    //product Add Attributes Post
    public function AddAttributes($product_id)
    {
        // $productdata = Product::select('id', 'product_name', 'product_code', 'product_color', 'product_main_image')->with('attributes')->find($product_id);
        // $productdata = json_decode(json_encode($productdata), true);
        // echo '<pre>';
        // print_r($productdata);
        // die();

        return view('admin.product.attribute.add_attribute', [
            'products' => Product::select('id', 'product_name', 'product_code', 'product_color', 'product_main_image')->with('attributes')->find($product_id)
        ]);
    }
    public function AddAttributesPost(Request $request)
    {
        // echo '<pre>';
        // // echo $request->category_url;
        // print_r($request->all());
        // die();


        $rules = [
            'size' => 'required',
            'price' => 'required',
            // 'stock' => 'required',
            // 'sku' => 'required|unique:product_attributes,sku',
        ];

        $customMessages = [
            'size.required' => 'The size Name field is required.',
            'price.required' => 'The Price field is required.',
            // 'product_code.required' => 'The Product Code field is required.',
            // 'stock.required' => 'The Stock field is required.',
        ];

        $this->validate($request, $rules, $customMessages);

        Product_attribute::insert([
            'product_id' => $request->product_id,
            'size' => $request->size,
            'price' => $request->price,
            // 'stock' => $request->stock,
            // 'sku' => $request->sku,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success_message', 'attribute added Successfully!');
    }

    //product Add Attributes edit Post
    public function EditAttributes(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo '<pre>';
            // print_r($data);
            // die();
            foreach ($data['attrId'] as $key => $attr) {
                if (!empty($attr)) {
                    Product_attribute::where(['id' => $data['attrId'][$key]])->update([
                        'size' => $data['size'][$key],
                        'price' => $data['price'][$key],
                    ]);
                }
            }
            return back()->with('success_message', 'Attribute Edited successfully');
        }
    }

    //product Add Attributes Delete
    public function DeleteAttribute($id)
    {
        Product_attribute::where('id', $id)->delete();
        return back()->with('success_message', 'Product Attribute deleted Successfully!');
    }

    //product Add Attributes Status change
    public function updateAttributeStatus($attribute_id)
    {
        $attribute = Product_attribute::find($attribute_id);
        $attribute = json_decode(json_encode($attribute), true);
        // echo '<pre>';
        // print_r($attribute['status']);
        // die();
        if ($attribute['status'] == 1) {
            Product_attribute::find($attribute_id)->update([
                'status' => 0
            ]);
        } else {
            Product_attribute::find($attribute_id)->update([
                'status' => 1
            ]);
        }

        return back()->with('success_message', 'Product status change Successfully!');
    }


    //product Add Images
    //product Add Images Post
    public function AddImages($product_id)
    {
        // $productdata = Product::select('id', 'product_name', 'product_code', 'product_color', 'product_main_image')->with('images')->find($product_id);
        // $productdata = json_decode(json_encode($productdata), true);
        // echo '<pre>';
        // print_r($productdata);
        // die();
        return view('admin.product.image.add_image', [
            'products' => Product::select('id', 'product_name', 'product_code', 'product_color', 'product_main_image')->with('images')->find($product_id)
        ]);
    }

    public function AddImagesPost(Request $request)
    {
        // echo '<pre>';
        // // echo $request->category_url;
        // print_r($request->all());
        // die();


        $rules = [
            'image' => 'required|image|unique:product_images,image',
        ];

        $customMessages = [];

        $this->validate($request, $rules, $customMessages);

        $image_id = product_image::insertGetId([
            'product_id' => $request->product_id,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);


        if ($request->hasFile('image')) {
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()) {
                // Get image extension
                $originalname = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                // genarate image name
                $imageName = $originalname . '-' . $image_id . '-' . rand(111, 99999) . '.' . $extension;
                $multiple_path = 'images/product_images/multiple/' . $imageName;
                //Upload the image
                Image::make($image_tmp)->save($multiple_path);
                product_image::find($image_id)->update([
                    'image' => $imageName
                ]);
            }
        }
        return back()->with('success_message', 'Image added Successfully!');
    }

    //product Add Attributes Status change
    public function updateImageStatus($image_id)
    {
        $image = product_image::find($image_id);
        $image = json_decode(json_encode($image), true);
        // echo '<pre>';
        // print_r($image['status']);
        // die();
        if ($image['status'] == 1) {
            product_image::find($image_id)->update([
                'status' => 0
            ]);
        } else {
            product_image::find($image_id)->update([
                'status' => 1
            ]);
        }

        return back()->with('success_message', 'Product image status change Successfully!');
    }

    //product Add Attributes Delete
    public function DeleteImage($id)
    {

        //Get product image
        $productImage = product_image::select('image')->where('id', $id)->first();

        //Get product Image path
        $multiple_image_path = 'images/product_images/multiple/';

        // Delete Product Image from Product_image folder if exists
        if (file_exists($multiple_image_path . $productImage->image)) {
            unlink($multiple_image_path . $productImage->image);
        }

        product_image::where('id', $id)->delete();
        return back()->with('success_message', 'Product Image deleted Successfully!');
    }





    public function AddDetails($product_id)
    {

        return view('admin.product.detail.add_detail', [
            'products' => Product::select('id', 'product_name', 'product_code', 'product_color', 'product_main_image')->with('details')->find($product_id)
        ]);
    }
    public function AddDetailsPost(Request $request)
    {
        Product_detail::insert([
            'product_id' => $request->product_id,
            'icon' => $request->icon,
            'name' => $request->name,
            'price' => $request->price,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success_message', 'detail added Successfully!');
    }

    //product Add Details edit Post
    public function EditDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo '<pre>';
            // print_r($data);
            // die();
            foreach ($data['attrId'] as $key => $attr) {
                if (!empty($attr)) {
                    Product_detail::where(['id' => $data['attrId'][$key]])->update([
                        'icon' => $data['icon'][$key],
                        'name' => $data['name'][$key],
                        'price' => $data['price'][$key],
                    ]);
                }
            }
            return back()->with('success_message', 'Detail Edited successfully');
        }
    }

    //product Add Details Delete
    public function DeleteDetail($id)
    {
        Product_detail::where('id', $id)->delete();
        return back()->with('success_message', 'Product Detail deleted Successfully!');
    }
}
