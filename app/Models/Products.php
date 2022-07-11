<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Trails\ModelScopes;

class Products extends Model
{
    use SoftDeletes, ModelScopes;
    protected $table = 'products';

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'slug', 'image', 'sort_desc', 'content', 'evaluate', 'specifications', 'title_attributes' , 'products_version', 'title_desc_gift', 'end_date_apply_gift', 'content_gift','regular_price','sale_price','sale', 'is_hot','is_flash_sale', 'is_apply_gift', 'status', 'brand_id',
    	 'order_sale_page', 'time_priority','price_priority', 'content_services_warranty', 'warranty_parameter', 'is_new'
    ];

    public function ProductImage()
    {
        return $this->hasMany('App\Models\ProductImage', 'id_product', 'id'); 
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'product_category', 'id_product', 'id_category');
    }

    public function CheckApplyGift()
    {
        if($this->is_apply_gift == 1 && !empty($this->end_date_apply_gift)){
            $end_date = $this->end_date_apply_gift;
            $now = \Carbon\Carbon::now();
            $end_date = \Carbon\Carbon::parse(\Carbon\Carbon::parse($end_date)->format('d-m-yy').'23:59:59');
            if($end_date->gt($now)){
                return true;
            }
        }
        return false;
    }


    public function CheckPricePriority()
    {
        if(!empty($this->price_priority) && !empty($this->time_priority)){
            $time_priority = explode(' - ', $this->time_priority);
            $now = \Carbon\Carbon::now();
            $time_priority[0] = \Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $time_priority[0].'1:00:00');
            $time_priority[1] = \Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $time_priority[1].'23:59:59');
            return $now->isBetween($time_priority[0], $time_priority[1], false);
        }
    }



    public function Brand()
    {
        return $this->belongsTo('App\Models\Categories', 'brand_id', 'id');
    }


    public function ProductAttributes()
    {
        return $this->hasMany('App\Models\ProductAttributes', 'id_product', 'id'); 
    }

    public function ProductVersion()
    {
        return $this->hasMany('App\Models\ProductVersion', 'id_product', 'id'); 
    }


    public function ProductGift()
    {
        return $this->hasMany('App\Models\ProductGift', 'id_product', 'id')->orderBy('created_at', 'ASC'); 
    }
    
    

}
