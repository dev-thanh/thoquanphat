<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtilitiesCategory extends Model
{
    protected $table = 'utilities_category';
    protected $fillable = [ 
    	'id_category', 'id_utilities'
	];
}
