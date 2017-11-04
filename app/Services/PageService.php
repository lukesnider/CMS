<?php
namespace App\Services;

use App\Models\Page;
use App\Models\Configuration;

class PageService {

	public function getPage($page,$other_pages = null)
	{
		
		if($other_pages != null)
		{
			return Page::where('slug',end($other_pages))->first();

		}		

		
		return Page::where('slug', $page)->first();
	}


}
