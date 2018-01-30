<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PageStatusTableSeeder extends Seeder
{
	protected $statuses = ['Draft','Live','Disabled'];
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		foreach($this->statuses AS $status)
		{
			DB::table('page_status')->insert([
				'status' => $status,
			]);
		}
		
    
	}
}
