<?php
namespace App\Services;

use App\Models\Page;
use App\Models\PagesElement;
use App\Models\PagesElementsMeta;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;

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
		
		$id = DB::table('pages_elements_id')->first()->current_id;
		$nextId = $id + 1;
				
		return [
			'page'		=>	$page,
			'next_id'	=>	$nextId,
		];
	}	
	
	
	public function pagesEdit($request)
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
	public function pageEdit($request)
	{
		dd($request->row);
	}

}
