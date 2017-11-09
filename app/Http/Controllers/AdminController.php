<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;


class AdminController extends Controller
{
	
    private $adminService;


    public function __construct(AdminService $adminService)
    {
		$this->adminService = $adminService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
        return view('admin.index');
    }
	
	
	public function pages()
	{
		$data = $this->adminService->pages();
		
		return view('admin.pages')->with($data);
	}	
	
	public function page($id)
	{
		$data = $this->adminService->page($id);
		
		return view('admin.page')->with($data);
	}	
	
	public function pageEdit(Request $request)
	{
		$data = $this->adminService->pageEdit($request);
		
		return view('admin.page')->with($data);
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
    public function show($id)
    {
        //
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
