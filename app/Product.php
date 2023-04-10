<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_main_image',
        'product_name',
        'section_id',
        'category_id',
        'brand_id',
        'product_code',
        'product_color',
        'product_price',
        'product_old_price',
        'product_quantity',
        'alert_quantity',
        'product_discount',
        'product_weight',
        'product_one',
        'product_two',
        'product_three',
        'product_four',
        'product_five',
        'product_six',
        'product_url',
        'product_short_description',
        'product_long_description',
        'product_video',
        'meta_keywords',
        'meta_title',
        'meta_description',
        'tags',
        'product_id',
        'tag_id',
        'is_featured',
    ];
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id')->select('id', 'category_name','category_url');
    }
    // public function tags()
    // {
    //     return $this->belongsToMany('App\Product_tag');
    // }
    public function tags()
    {
        return $this->hasMany('App\Product_tag');
    }
    public function attribute()
    {
        return $this->hasMany('App\Product_attribute');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id')->select('id', 'name');
    }

    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id')->select('id', 'name');
    }
    public function attributes()
    {
        return $this->hasMany('App\Product_attribute');
    }

    public function images()
    {
        return $this->hasMany('App\product_image');
    }

    public function detail()
    {
        return $this->hasMany('App\Product_detail');
    }
    public function details()
    {
        return $this->hasMany('App\Product_detail');
    }


    public static function productFilters(){
        //filter Arrays
        $productFilters['product_oneArray'] = array('Phone', 'Laptop', 'Watch','Tab');
        $productFilters['product_twoArray'] = array('Color Family', 'White', 'Black', 'Multicolor','Blue');
        $productFilters['product_threeArray'] = array('Main Material', 'Cotton', 'Polyester', 'Microfiber Polyester', 'Synthetic');
        $productFilters['product_fourArray'] = array('Warranty Type', 'No Warranty','Local seller warranty','Non-local warranty');
        $productFilters['product_fiveArray'] = array('Men Trend', 'Athleisure','Street Style','Retro & Vintage');
        $productFilters['product_sixArray'] = array('Sleeves', 'Short Sleeve','3/4 Sleeve');

        return $productFilters;
    }
}
