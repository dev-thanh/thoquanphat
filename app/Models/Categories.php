<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = [ 'name','slug','parent_id','image','content', 'meta_title', 'meta_description', 'meta_keyword','type', 'banner', 'order'];


    public function get_child_cate()
    {
        return $this->where('parent_id', $this->id)->orderBy('order')->get();
    }

    public function getParent()
    {
        return $this->where('id', $this->parent_id)->first();
    }

    public function Products()
    {
        return $this->belongsToMany('App\Models\Products', 'product_category', 'id_category', 'id_product');
    }

    public function Projects()
    {
        return $this->belongsToMany('App\Models\Projects', 'projects_category', 'id_category', 'id_projects');
    }

    public function Services()
    {
        return $this->belongsToMany('App\Models\Services', 'services_category', 'id_category', 'id_services');
    }

    public function Quotes()
    {
        return $this->belongsToMany('App\Models\Quotes', 'quotes_category', 'id_category', 'id_quotes');
    }

    public function BeautifulHouse()
    {
        return $this->belongsToMany('App\Models\BeautifulHouse', 'category_beautiful_house', 'id_category', 'id_beautiful_house');
    }

    public function Utilities()
    {
        return $this->belongsToMany('App\Models\Utilities', 'utilities_category', 'id_category', 'id_utilities');
    }
}
