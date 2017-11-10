<?php
namespace App\Services;

use App\Models\Page;
use App\Models\PagesElements;
use App\Models\PagesElementsMeta;

class AdminService {

	
	public function pages()
	{
		$pages	=	Page::all();
		
		
		return [
			'pages'	=>	$pages,
		];
	}	
	
	public function page($id)
	{
		$page	=	Page::find($id);
		
		
		
		return [
			'page'	=>	$page,
		];
	}	
	
	
	public function pageEdit($request)
	{		
		
		$page	=	Page::find($request->page_id);
		
		
		if($request->has('slug'))
		{
			$page->slug		=	$request->slug;
		}
		
		$page->title	=	$request->title;
		$page->status	=	$request->status;
		
		$page->save();
		

		$pages	=	Page::all();

		return [
			'pages'	=>	$pages,
		];
	}

}
