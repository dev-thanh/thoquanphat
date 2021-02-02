<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
   	protected $table = 'order_detail';
    
    protected $fillable = [ 
        'id_order', 'id_product', 'price' , 'qty' , 'total'
    ];

    public function Products()
    {
        return $this->belongsTo('App\Models\Products', 'id_product', 'id');
    }
}
