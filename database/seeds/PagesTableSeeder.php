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
		foreach($this->pages AS $id	=> $page)
		{
			DB::table('pages')->insert([
				'id' 		    => $id,
                'index' 		=> $page['index'],
				'slug' 		    => $page['slug'],
				'title' 		=> $page['title'],
				'status' 		=> $page['status'],                
				'created_at' 	=> date("Y-m-d H:i:s"),
				'updated_at' 	=> date("Y-m-d H:i:s"),
			]);
        }
   }
}
