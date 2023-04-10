<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'banner_main_image',
        'banner_image',
        'banner_title',
        'banner_long_description',
        'banner_url',

    ];
    public static function getBanners(){
        $getBanners = Banner::where('status',1)->get()->toArray();
        // dd($getBanners);
        // die();
        return $getBanners;
    }
}
