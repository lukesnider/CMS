<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Configuration;

class Page extends Model
{
    protected $with = ['elements'];
    
    public function elements()
    {
        return $this->hasMany('App\Models\PagesElement', 'page_id');
    }
	
	public function isIndex()
	{
		$index = Configuration::where('config','index_page')->first();
		
		if($index->value == $this->id)
		{
			return true;
		}
		
		return false;
	}
}
