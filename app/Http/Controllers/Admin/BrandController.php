<?php

namespace App\Http\Controllers\Admin;


use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function Brand()
    {
        return view('admin.brand.index', [
            'brands' => Brand::all(),

        ]);
        // echo 'ada';
    }
    public function AddBrand()
    {
        return view('admin.brand.add_brand');
        // echo 'ada';
    }
    public function AddBrandPost(Request $request)
    {
        // echo '<pre>';
        // // echo $request->category_url;
        // print_r($request->all());
        // die();

        $rules = [
            'brand_name' => 'required',
        ];

        $customMessages = [
            'brand_name.required' => 'The Brand Name field is required.',
        ];
        $this->validate($request, $rules, $customMessages);

        if (empty($request->brand_url)) {
            $request->brand_url = Str::slug($request->brand_name . '-' . Str::random(5));
        } else {
            $request->brand_url = Str::slug($request->brand_name . '-' . Str::random(5));
        }


        Brand::insert([
            'name' => $request->brand_name,
            'brand_url' => $request->brand_url,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success_message', 'Your Brand Name Added Successfully');
    }

    public function EditBrand($brand_id)
    {
        return view('admin.brand.edit', [
            'brand_info' => Brand::find($brand_id),

        ]);
    }

    public function EditBrandPost(Request $request)
    {

        $rules = [
            'name' => 'required|unique:brands,name,' . $request->brand_id,
        ];

        $customMessages = [
            'name.required' => 'The Brand Name field is required.',
        ];

        $this->validate($request, $rules, $customMessages);

        // print_r($request->all());
        Brand::find($request->brand_id)->update([
            'name' => $request->name,
        ]);


        return back()->with('success_message', $request->name . ' Brand Updated sucessfully');;
    }


    //  Brand URL edit View
    //  Brand URL edit-Post View

    public function URLEditBrand($brand_id)
    {
        $brand_info = Brand::find($brand_id);
        return view('admin.brand.url_edit', [
            'brand_info' => $brand_info,
        ]);
    }
    public function URLEditBrandPost(Request $request)
    {

        $rules = [
            'brand_url' => 'required|unique:brands,brand_url,' . $request->brand_id,
        ];

        $customMessages = [
            'brand_url.required' => 'The Brand URL field is required.',
            'brand_url.unique' => 'The Brand URL is Already Exists.'
        ];

        $this->validate($request, $rules, $customMessages);

        // print_r($request->all());
        // die();
        Brand::find($request->brand_id)->update([
            'brand_url' => Str::slug($request->brand_url),
        ]);
        return back()->with('success_message', $request->category_name . ' Brand URL Updated sucessfully');;
    }

    //  Brand Meta edit View
    //  Brand Meta edit-Post View

    public function MetaEditBrand($brand_id)
    {
        $brand_info = Brand::find($brand_id);
        return view('admin.brand.meta_edit', [
            'brand_info' => $brand_info,
        ]);
    }
    public function MetaEditBrandPost(Request $request)
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
        Brand::find($request->brand_id)->update([
            'meta_keywords' => $request->meta_keywords,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);
        return back()->with('success_message', $request->brand_name . ' Brand SEO Updated sucessfully');
    }

    public function updateBrandStatus(Request $request)
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
            Brand::where('id', $data['brand_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'brand_id' => $data['brand_id']]);
        }
    }

    public function DeleteBrand($brand_id)
    {
        Brand::where('id', $brand_id)->delete();
        return back()->with('success_message', 'Brand deleted Successfully!');
    }
}
