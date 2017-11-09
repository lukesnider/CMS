<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagesElement extends Model
{
     protected $table = 'pages_elements';

    // public function position()
    // {
        // return $this->hasOne('App\Models\pages_elements_pos', 'element_id');
    // }
	
    public function metaData()
    {
        return $this->hasOne('App\Models\PagesElementsMeta', 'element_id');
    }    
}
