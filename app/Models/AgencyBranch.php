<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgencyBranch extends Model
{
    protected $table = 'agency_branch';
    protected $fillable = [ 'name','phone','email', 'address','status'];
}
