<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryBeautifulHouse extends Model
{
    protected $table = 'category_beautiful_house';
    
    protected $fillable = [ 
    	'id_category', 'id_beautiful_house'
	];
}
