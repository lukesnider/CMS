<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagesElement extends Model
{
     protected $table = 'pages_elements';
	
    public function metaData()
    {
        return $this->hasOne('App\Models\PagesElementsMeta', 'element_id');
    }
}
