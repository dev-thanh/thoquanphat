<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';

    protected $fillable = [ 
        'name', 'slug' , 'desc' , 'content' , 'image' , 'more_image' , 'stt', 'view', 'status' , 'meta_title' , 'meta_description' , 'meta_keyword', 'is_new', 'type','hot'
	];

    public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'projects_category', 'id_projects', 'id_category');
    }
}
