<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeautifulHouse extends Model
{
    protected $table = 'beautiful_house';

    protected $fillable = [ 
        'name', 'slug' , 'desc' , 'content' , 'image' , 'more_image' , 'stt', 'view', 'status' , 'meta_title' , 'meta_description' , 'meta_keyword', 'is_new', 'type'
	];

    public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'category_beautiful_house', 'id_beautiful_house', 'id_category');
    }
}
