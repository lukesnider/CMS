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
		
		
		return $page;
	}
	
	
	public function  getIndexPage()
	{
		$index = Configuration::getIndex();
		
		$page	=	Page::find($index);
		
		if(!$page || $page->status == 0)
		{
			$page = Page::where('slug', '/')
							->where('status', 1)
							->first();
			if(!$page)
			{
				$page = Page::where('status', 1)
								->first();
			}
		}

		return $page;

		
	}

}
