<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Trails\ModelScopes;

class Contact extends Model
{
    use ModelScopes;
    
    protected $table = 'contact';


    public function Customers()
    {
   		return $this->hasOne('App\Models\Customers', 'id', 'id_customers');
    }

   

}
