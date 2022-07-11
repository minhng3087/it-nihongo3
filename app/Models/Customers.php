<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    protected $fillable = ['name', 'email', 'phone', 'id_province', 'id_district', 'id_ward', 'address'];
}
