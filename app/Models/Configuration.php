<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public static function getIndex()
	{
		
		$config = Configuration::where('config', 'index_page')->first();
		
		return $config->value;
	}   

	public static function setIndex($id)
	{
		
		$config = Configuration::where('config', 'index_page')->first();

		$config->value = $id;
		
		$config->save();
		
		return $config->value;
	}
}
