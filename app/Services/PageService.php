<?php
namespace App\Services;

use App\Models\Page;
use App\Models\Configuration;

class PageService {

	public function getPage($page)
	{
		
		$slug = '/' .$page;
		
		$page = Page::where('slug', $slug)
						->where('status', 1)
						->first();
		
		
		if(!$page)
		{
			$page = Page::where('index', 1)
							->where('status', 1)
							->first();
		}
		
		
		return $page;
	}


}
