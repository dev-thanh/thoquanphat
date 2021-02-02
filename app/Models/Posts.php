<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = [ 
    	'name', 'slug' , 'desc' , 'content' , 'image' , 'type' , 'hot' , 'status' , 'meta_title' , 'meta_description' , 'meta_keyword', 'user_id', 'view'
	];


	public function Author()
    {
        return $this->hasOne('App\User', 'id', 'user_id'); 
    }
}
