<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\PageService;
use App\Models\Page;

class PageController extends Controller
{

    private $pageService;


    public function __construct(PageService $pageService)
    {
 	$this->pageService = $pageService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$page = Page::where('index',1)->first();
	return \Cache::remember('test.' . $page->slug, 120, function() use ($page){			
		return view('test.test', ['page' => $page])->render();
	});

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page,$other_pages = null)
    {
        if($other_pages) 
        {
            $other_pages = explode('/', $other_pages);

        }
	$page = $this->pageService->getPage($page,$other_pages);
	return \Cache::remember('test.' . $page->slug, 120, function() use ($page){			
		return view('test.test', ['page' => $page])->render();
	});

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
