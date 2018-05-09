<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PagesElementsTypeTableSeeder extends Seeder
{
	protected $types = ['Row', 'Column'];
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		foreach($this->types AS $type)
		{
			DB::table('pages_elements_type')->insert([
				'type' => $type,
			]);
		}
		
    
	}
}
