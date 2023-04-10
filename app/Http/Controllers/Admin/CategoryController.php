<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
       
        return view('admin.category.index', [
          
            'categories' => Category::with(['section', 'parentcategory'])->orderBy('id', 'desc')->get()
        ]);
    }
    public function create()
    {
        return view('admin.category.create', [
            'sections' => Section::where(['status' => 1])->get(),
            'getCategories' => Category::where(['status' => 1])->where(['parent_id' => 0])->get(),
        ]);
    }


    public function store(Request $request)
    {
      
        $rules = [
            'category_name' => 'required',

            'category_image' => 'unique:categories,category_image',

        ];

        $customMessages = [
            'category_name.required' => 'The Category Name field is required.',

            'category_image.unique' => 'Please change the image name.'
        ];

        $this->validate($request, $rules, $customMessages);

        if (empty($request->category_url)) {
            $request->category_url = Str::slug($request->category_name . '-' . Str::random(5));
        }

        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'section_id' => 1,
            'parent_id' => $request->parent_id,
            'category_discount' => $request->category_discount,
            'category_url' => Str::slug($request->category_url),
            'category_description' => htmlentities($request->category_description, ENT_QUOTES),
            'status' => 1,
            'created_at' => Carbon::now()
        ]);


        if ($request->hasFile('category_image')) {
            $image_tmp = $request->file('category_image');
            if ($image_tmp->isValid()) {
                // Get image extension
                $originalname = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                // genarate image name
                $imageName = $originalname . rand(111, 99999) . '.' . $extension;
                $imagePath = 'images/category_images/' . $imageName;
                //Upload the image
                Image::make($image_tmp)->resize(280, 220)->save($imagePath);
                Category::find($category_id)->update([
                    'category_image' => $imageName
                ]);
            }
        }

        return back()->with('success_message', $request->category_name . ' category added sucessfully');
    }



    public function appendCategoriesLevel(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data);
            // die();
            $getCategories = Category::with('subcategories')->where(['section_id' => $data['section_id'], 'parent_id' => 0, 'status' => 1])->get();
            $getCategories = json_decode(json_encode($getCategories), true);
            // echo "<pre>";
            // print_r($getCategories);
            // die();
            return view('admin.category.append_categories_level', [
                'getCategories' => $getCategories,
            ]);
        }
    }

    public function EditCategory($category_id)
    {
        // echo Category::with(['section', 'parentcategory'])->find($category_id);
        $category_info = Category::with(['section', 'parentcategory'])->find($category_id);
        $getCategories = Category::with('subcategories')->where(['parent_id' => 0, 'section_id' => $category_info->section_id])->get();
        $getCategories = json_decode(json_encode($getCategories), true);
        // echo "<pre>";
        // print_r($getCategories);
        // die();
        return view('admin.category.edit', [
            'category_info' => $category_info,
            // 'sections' => Section::get(),
            'sections' => Section::where(['status' => 1])->get(),
            'getCategories' => $getCategories,
            // Category::with(['section', 'parentcategory'])->get()
        ]);
    }

    public function EditCategoryPost(Request $request)
    {

        $rules = [
            'category_name' => 'required',
            'category_image' => 'unique:categories,category_image',
        ];

        $customMessages = [
            'category_name.required' => 'The Category Name field is required.',
            'category_image.unique' => 'Please change the image name.'
        ];

        $this->validate($request, $rules, $customMessages);

        // print_r($request->all());
        Category::find($request->category_id)->update([
            'category_name' => $request->category_name,
            'section_id' => 1,
            'parent_id' => $request->parent_id,
            'category_discount' => $request->category_discount,
            // 'category_url' => $request->category_url,
            // 'category_description' => $request->category_description
        ]);

        if ($request->hasFile('category_image')) {
            $image_tmp = $request->file('category_image');
            if ($image_tmp->isValid()) {
                // Get image extension
                $originalname = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                // genarate image name
                $imageName = $originalname . rand(111, 99999) . '.' . $extension;
                $imagePath = 'images/category_images/' . $imageName;
                //Upload the image
                Image::make($image_tmp)->resize(280, 220)->save($imagePath);
                Category::find($request->category_id)->update([
                    'category_image' => $imageName
                ]);
            }
        }
        return back()->with('success_message', $request->category_name . ' category Updated sucessfully');;
    }


    //  Category URL edit View
    //  Category URL edit-Post View

    public function URLEditCategory($category_id)
    {
        $category_info = Category::with(['section', 'parentcategory'])->find($category_id);
        return view('admin.category.url_edit', [
            'category_info' => $category_info,
        ]);
    }
    public function URLEditCategoryPost(Request $request)
    {

        $rules = [
            'category_url' => 'required|unique:categories,category_url,' . $request->category_id,
        ];

        $customMessages = [
            'category_url.required' => 'The Category URL field is required.',
            'category_url.unique' => 'The Category URL is Already Exists.'
        ];

        $this->validate($request, $rules, $customMessages);

        // print_r($request->all());
        // die();
        Category::find($request->category_id)->update([
            'category_url' => Str::slug($request->category_url),
            // 'category_description' => $request->category_description
        ]);
        return back()->with('success_message', $request->category_name . ' category URL Updated sucessfully');;
    }




    //  Category description edit View
    //  Category description edit-Post View

    public function DescriptionEditCategory($category_id)
    {
        $category_info = Category::with(['section', 'parentcategory'])->find($category_id);
        return view('admin.category.description_edit', [
            'category_info' => $category_info,
        ]);
    }
    public function DescriptionEditCategoryPost(Request $request)
    {
        // print_r($request->all());
        // die();
        Category::find($request->category_id)->update([
            'category_description' => htmlentities($request->category_description, ENT_QUOTES),
            // 'category_description' => $request->category_description
        ]);
        return back()->with('success_message', $request->category_name . ' category Description Updated sucessfully');;
    }


    //  Category Meta edit View
    //  Category Meta edit-Post View

    public function MetaEditCategory($category_id)
    {
        $category_info = Category::with(['section', 'parentcategory'])->find($category_id);
        return view('admin.category.meta_edit', [
            'category_info' => $category_info,
        ]);
    }
    public function MetaEditCategoryPost(Request $request)
    {
        $rules = [
            'meta_keywords' => 'max:255',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
        ];

        $customMessages = [
            // 'category_url.required' => 'The Category URL field is required.',
        ];

        $this->validate($request, $rules, $customMessages);
        // print_r($request->all());
        // die();
        Category::find($request->category_id)->update([
            'meta_keywords' => $request->meta_keywords,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);
        return back()->with('success_message', $request->category_name . ' category SEO Updated sucessfully');
    }


    public function updateCategoryStatus(Request $request)
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
            Category::where('id', $data['category_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'category_id' => $data['category_id']]);
        }
    }

    //delete category Image
    public function DeleteCategoryImage($category_id)
    {
        //Get category image
        $categoryImage = Category::select('category_image')->where('id', $category_id)->first();

        //Get category Image path
        $category_image_path = 'images/category_images/';

        // Delete Category Image from Category_image folder if exists
        if (file_exists($category_image_path . $categoryImage->category_image)) {
            unlink($category_image_path . $categoryImage->category_image);
        }

        // delete Category image from category table
        Category::where('id', $category_id)->update(['category_image' => '']);
        return back()->with('success_message', ' Category Image Deleted Sucessfully');;
    }

    public function DeleteCategory($category_id)
    {
        Category::where('id', $category_id)->delete();
        return back()->with('success_message', 'Category deleted Successfully!');
    }
}
