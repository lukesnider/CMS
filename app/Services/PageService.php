<?php
namespace App\Services;

use App\Models\Page;
use App\Models\Configuration;

class PageService {

	public function getPage($page)
	{
		
		$slug = '/' .$page;
		
		return Page::where('slug', $slug)->first();
	}


}
