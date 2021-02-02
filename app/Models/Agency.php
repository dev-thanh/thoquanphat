<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $table = 'agency';
    protected $fillable = [ 'name','phone','address','fax','area','content','status'];
}
