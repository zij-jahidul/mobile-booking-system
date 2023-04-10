<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'brand_url', 'meta_title', 'meta_description', 'meta_keywords'];
}
