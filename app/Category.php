<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_image', 'category_description', 'category_name', 'section_id', 'parent_id', 'category_discount', 'category_url', 'meta_keywords', 'meta_title', 'meta_description'];

    //sub category show on add category
    public function subcategories()
    {
        return $this->hasMany('App\category', 'parent_id')->where('status', 1);
    }

    // show section name on index id->name
    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id')->select('id', 'name');
    }

    //show parent category name on index id->name
    public function parentcategory()
    {
        return $this->belongsTo('App\category', 'parent_id')->select('id', 'category_name');
    }


    public static function catDetails($url){
        $catDetails = Category::select('id','parent_id','category_name','category_url','category_description','meta_keywords','meta_title','meta_description')->with(['subcategories'=>
        function($query){
            $query->select('id','parent_id','category_name','category_url','category_description','meta_keywords','meta_title','meta_description')->where('status',1);
        }])->where('category_url',$url)->first()->toArray();
        // dd($catDetails);
        // echo'<pre>';
        // print_r($catDetails);
        // die();

        if ($catDetails['parent_id']==0) {
            // Only show main category in breadcrumb
            $breadcrumb = '<a href="'.url($catDetails['category_url']).'">' .$catDetails['category_name']. '</a>';
        } else {
            // show main category and subcategory in breadcrumb
            $parentCategory = Category::select('category_name','category_url')->where('id',$catDetails['parent_id'])->first()->toArray();
            $breadcrumb = '<a href="'.url($parentCategory['category_url']).'">' .$parentCategory['category_name']. '</a>&nbsp;<span class="divider"></span>&nbsp;<a href="'.url($catDetails['category_url']).'">' .$catDetails['category_name']. '</a>';
        }

        $catIds = array();
        $catIds[] = $catDetails['id'];
        foreach ($catDetails['subcategories'] as $key => $subcat) {
            $catIds[] = $subcat['id'];
        }
        // dd($catIds);
        // die();
        return array('catIds'=>$catIds,'catDetails'=>$catDetails,'breadcrumb'=>$breadcrumb);
    }
}
