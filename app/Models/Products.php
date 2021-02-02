<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [ 
        'code', 'name', 'slug' , 'desc' , 'content' , 'image' , 'more_image' , 'hot' , 'stt', 'view', 'status' , 'meta_title' , 'meta_description' , 'meta_keyword', 'is_new', 'is_sale', 'is_selling', 'type', 'price', 'price_sale', 'percent_sale', 'price_priority', 'xuat_xu', 'tinh_trang'
	];

    public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'product_category', 'id_product', 'id_category');
    }
}
