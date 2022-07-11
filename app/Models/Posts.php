<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Trails\ModelScopes;

class Posts extends Model
{
	use ModelScopes; 

    protected $table = 'posts';

    protected $fillable = [ 
    	'name', 'slug' , 'desc' , 'content' , 'image' , 'type' , 'hot' , 'status' , 'view_count', 'published_at'
	];
    
	public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'post_category', 'id_post', 'id_category');
    }

    public function scopePublished($query) 
    {
        return $query->where('published_at', '<=', \Carbon\Carbon::now()->format('Y-m-d'));
    } 

    protected $dates = [
        'published_at',
    ];
}
