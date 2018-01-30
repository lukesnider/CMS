<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PagesTableSeeder extends Seeder
{    
	protected $pages = [
        
        1   =>   [
            'slug'      =>  '/',
            'title'     =>  'Index',
            'status'    =>  2

        ],
        2   =>   [
            'slug'      =>  '/about',
            'title'     =>  'About Page',
            'status'    =>  1
        ],       
    
    ];
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		foreach($this->pages AS $page)
		{
			DB::table('pages')->insert([
                'slug'      =>  $page['slug'],
                'title'     =>  $page['title'],
                'status'    =>  $page['status']
        	]);
		}
		
    
	}
}
