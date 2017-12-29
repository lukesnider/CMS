<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagesElement extends Model
{
     protected $table = 'pages_elements';

    public function content($id)
    {
	    return $this->where('type', 3)->where('parent_id', $id)->get();
    }	
}
