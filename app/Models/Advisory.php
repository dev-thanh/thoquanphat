<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advisory extends Model
{
    protected $table = 'advisory';

    protected $fillable = [ 'name','phone','building_site','advisory_content','status'];
}
