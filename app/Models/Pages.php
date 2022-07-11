<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';
    protected $fillable = ['type', 'name_page', 'route', 'content', 'image', 'banner'];
}
