<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function EditSocial($social_id){

        // $social = Social::select('facebook')->where('id',1)->get()->first();
        // echo $social->facebook;
        // die;
        $social = Social::find($social_id);
        return view('admin.social.index',[
            'social' => $social
        ]);
    }

    public function EditSocialPost(Request $request){
        Social::find($request->social_id)->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'google' => $request->google,
            'instagram' => $request->instagram,
        ]);
        return back();
    }
}
