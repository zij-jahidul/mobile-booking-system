<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BannerController extends Controller
{
    public function index()
    {
        // echo '<pre>';
        // $banners = Banner::with(['category', 'section'])->get();
        // $banners = json_decode(json_encode($banners));
        // print_r($banners);
        // die();
        return view('admin.banner.index', [
            // 'categories' => Category::with(['section', 'parentcategory'])->get()
            'banners' => Banner::orderBy('id', 'desc')->get()
        ]);
    }
    public function create()
    {

        return view('admin.banner.create');
    }


    public function store(Request $request)
    {
        // echo '<pre>';
        // // echo $request->category_url;
        // print_r($request->all());
        // die();

        // Banner Validation
        $rules = [
            'banner_title' => 'required',
            'banner_main_image' => 'unique:banners,banner_main_image',
            'banner_image' => 'unique:banners,banner_image',

        ];

        $customMessages = [
            'banner_title.required' => 'The Banner Name field is required.',
            'banner_main_image.unique' => 'Please change the image name.',
            'banner_image.unique' => 'Please change the image name.'
        ];

        $this->validate($request, $rules, $customMessages);



        $banner_id = Banner::insertGetId([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_long_description' => htmlentities($request->banner_long_description, ENT_QUOTES),
            'status' => 1,
            'created_at' => Carbon::now()
        ]);


        if ($request->hasFile('banner_main_image')) {
            $image_tmp = $request->file('banner_main_image');
            if ($image_tmp->isValid()) {
                // Get image extension
                // $originalname =Str::slug() $image_tmp->getClientOriginalName();
                $originalname =Str::slug($image_tmp->getClientOriginalName());
                $extension = $image_tmp->getClientOriginalExtension();
                // genarate image name
                $imageName = $originalname . '-' . $banner_id . '-' . rand(111, 99999) . '.' . $extension;
                $large_image_path = 'images/banner_images/' . $imageName;

                //Upload the image
                Image::make($image_tmp)->save($large_image_path);
                Banner::find($banner_id)->update([
                    'banner_main_image' => $imageName
                ]);
            }
        }

        if ($request->hasFile('banner_image')) {
            $image_tmp = $request->file('banner_image');
            if ($image_tmp->isValid()) {
                // Get image extension
                // $originalname =Str::slug() $image_tmp->getClientOriginalName();
                $originalname =Str::slug($image_tmp->getClientOriginalName());
                $extension = $image_tmp->getClientOriginalExtension();
                // genarate image name
                $imageName = $originalname . '-' . $banner_id . '-' . rand(111, 99999) . '.' . $extension;
                $large_image_path = 'images/banner_short_image/' . $imageName;

                //Upload the image
                Image::make($image_tmp)->save($large_image_path);
                Banner::find($banner_id)->update([
                    'banner_image' => $imageName
                ]);
            }
        }


        return back()->with('success_message', $request->banner_title . ' banner added sucessfully');
    }


    public function EditBanner($banner_id)
    {
        // echo 'asddsa';
        // die();
        $banner_info = Banner::find($banner_id);

        // echo '<pre>';
        // print_r($categories);
        // die();
        return view('admin.banner.edit', [
            'banner_info' => $banner_info,
        ]);
    }


    public function EditBannerPost(Request $request)
    {

        $rules = [
            'banner_title' => 'required',
            'banner_main_image' => 'unique:banners,banner_main_image',
            'banner_image' => 'unique:banners,banner_image',

        ];

        $customMessages = [
            'banner_title.required' => 'The Banner Name field is required.',
            'banner_main_image.unique' => 'Please change the image name.',
            'banner_image.unique' => 'Please change the image name.'
        ];

        $this->validate($request, $rules, $customMessages);

        Banner::find($request->banner_id)->update([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_long_description' => htmlentities($request->banner_long_description, ENT_QUOTES),
        ]);

        if ($request->hasFile('banner_main_image')) {
            $image_tmp = $request->file('banner_main_image');
            if ($image_tmp->isValid()) {
                // Get image extension
                $originalname = Str::slug($image_tmp->getClientOriginalName());
                $extension = $image_tmp->getClientOriginalExtension();
                // genarate image name
                $imageName = $originalname . '-' . $request->banner_id . '-' . rand(111, 99999) . '.' . $extension;
                $large_image_path = 'images/banner_images/' . $imageName;

                //Upload the image
                Image::make($image_tmp)->save($large_image_path);
                Banner::find($request->banner_id)->update([
                    'banner_main_image' => $imageName
                ]);
            }
        }

        if ($request->hasFile('banner_image')) {
            $image_tmp = $request->file('banner_image');
            if ($image_tmp->isValid()) {
                // Get image extension
                $originalname = Str::slug($image_tmp->getClientOriginalName());
                $extension = $image_tmp->getClientOriginalExtension();
                // genarate image name
                $imageName = $originalname . '-' . $request->banner_id . '-' . rand(111, 99999) . '.' . $extension;
                $large_image_path = 'images/banner_short_image/' . $imageName;

                //Upload the image
                Image::make($image_tmp)->save($large_image_path);
                Banner::find($request->banner_id)->update([
                    'banner_image' => $imageName
                ]);
            }
        }



        return back()->with('success_message', $request->banner_title . ' banner Updated sucessfully');;
    }


    public function DeleteBannerImage($banner_id)
    {
        //Get banner image
        $bannerImage = Banner::select('banner_main_image')->where('id', $banner_id)->first();

        //Get banner Image path
        $large_image_path = 'images/banner_images/';

        // Delete Banner Image from Banner_image folder if exists
        if (file_exists($large_image_path . $bannerImage->banner_main_image)) {
            unlink($large_image_path . $bannerImage->banner_main_image);
        }

        // delete Banner image from banner table
        Banner::where('id', $banner_id)->update(['banner_main_image' => '']);
        return back()->with('success_message', ' Banner Image Deleted Sucessfully');;
    }

    public function DeleteShortBannerImage($banner_id)
    {
        //Get banner image
        $bannerImage = Banner::select('banner_image')->where('id', $banner_id)->first();

        //Get banner Image path
        $large_image_path = 'images/banner_short_image/';

        // Delete Banner Image from Banner_image folder if exists
        if (file_exists($large_image_path . $bannerImage->banner_image)) {
            unlink($large_image_path . $bannerImage->banner_image);
        }

        // delete Banner image from banner table
        Banner::where('id', $banner_id)->update(['banner_image' => '']);
        return back()->with('success_message', ' Banner Image Deleted Sucessfully');;
    }




    public function updateBannerStatus(Request $request)
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
            Banner::where('id', $data['banner_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'banner_id' => $data['banner_id']]);
        }
    }


    public function DeleteBanner($banner_id)
    {
        Banner::where('id', $banner_id)->delete();
        return back()->with('success_message', 'Banner deleted Successfully!');
    }
}
