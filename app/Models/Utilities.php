<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilities extends Model
{
    protected $table = 'utilities';

    protected $fillable = [ 
        'name', 'slug' , 'desc' , 'content' , 'image' , 'more_image' , 'stt', 'view', 'status' , 'meta_title' , 'meta_description' , 'meta_keyword', 'is_new', 'type'
	];

    public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'utilities_category', 'id_utilities', 'id_category');
    }
}
