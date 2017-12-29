<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PageStatusTableSeeder extends Seeder
{

    protected $statuses = [
        1 => ['status' => 'Draft'],
        2 => ['status' => 'Live'],
        3 => ['status' => 'Inactive'],
        
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach($this->statuses AS $id	=>	$status)
		{
			DB::table('page_status')->insert([
				'id' 		    => $id,
                'status' 		=> $status['status'],               
				'created_at' 	=> date("Y-m-d H:i:s"),
				'updated_at' 	=> date("Y-m-d H:i:s"),
			]);
        }
    }
}
