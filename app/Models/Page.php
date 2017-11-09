<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $with = ['elements'];
    
    public function elements()
    {
        return $this->hasMany('App\Models\PagesElement', 'page_id');
    }
}
