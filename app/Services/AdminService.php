<?php
namespace App\Services;

use App\Models\Page;
use App\Models\PagesElements;
use App\Models\PagesElementsMeta;
use App\Models\Configuration;

class AdminService {

	
	public function pages()
	{
		$pages	=	Page::all();
		$index	=	Configuration::getIndex();
		
		return [
			'pages'			=>	$pages,
			'index_page'	=>	$index,
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
		
		if($request->has('index_page'))
		{
			Configuration::setIndex($page->id);
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
