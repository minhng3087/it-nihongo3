<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   	protected $table = 'menu_items';
    protected $fillable = ['title', 'url', 'position', 'id_group', 'class', 'icon', 'parent_id'];
    public function get_child_cate()
    {
    	return $this->where('parent_id', $this->id)->orderBy('position')->get();
    }
}
