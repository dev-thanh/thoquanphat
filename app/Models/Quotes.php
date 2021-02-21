<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    protected $table = 'quotes';

    protected $fillable = [ 
        'name', 'slug' , 'desc' , 'content' , 'image' , 'more_image' , 'stt', 'view', 'status' , 'meta_title' , 'meta_description' , 'meta_keyword', 'is_new', 'type'
	];

    public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'quotes_category', 'id_quotes', 'id_category');
    }
}
