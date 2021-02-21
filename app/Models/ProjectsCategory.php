<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectsCategory extends Model
{
    protected $table = 'projects_category';
    
    protected $fillable = [ 
    	'id_category', 'id_projects'
	];
}
