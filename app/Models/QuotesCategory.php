<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotesCategory extends Model
{
    protected $table = 'quotes_category';
    protected $fillable = [ 
    	'id_category', 'id_quotes'
	];
}
