<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [ 'name','slug','parent_id', 'type', 'meta_orthers', 'meta_banner', 'image', 'banner'];


    public function get_child_cate()
    {
        return $this->where('parent_id', $this->id)->get();
    }

    public function getParent()
    {
        return $this->where('id', $this->parent_id)->first();
    }

    public function Posts()
    {
        return $this->belongsToMany('App\Models\Posts', 'post_category', 'id_category', 'id_post');
    }

    public function Products()
    {
        return $this->belongsToMany('App\Models\Products', 'product_category', 'id_category', 'id_product');
    }
}
