<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   	protected $table = 'orders';
    
    protected $fillable = [ 
        'id_customer', 'type' , 'total_price' , 'status'
    ];

    public function Customers()
    {
    	return $this->hasOne('App\Models\Customer', 'id', 'id_customer');
    }

    public function OrderDetail()
    {
    	return $this->hasMany('App\Models\OrderDetail', 'id_order', 'id');
    }
}
