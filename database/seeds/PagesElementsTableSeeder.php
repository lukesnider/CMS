<?php

use Illuminate\Database\Seeder;

class PagesElementsTableSeeder extends Seeder
{
    protected $rows = [
        1 => [
		    'page_id'   =>  1,
			'type'      =>  1,
            'position'  =>  1,
        ],
        2 => [
		    'page_id'   =>  1,
			'type'      =>  1,
            'position'  =>  2,
        ],
    ];

    protected $columns = [
        3 => [
            'page_id'   =>  1,
			'parent_id' =>  1,            
			'type'      =>  2,
            'position'  =>  1,
            'x_size'    =>  12,
            'y_size'    =>  100,
            'content'   =>  '<h1>Hello World</h1>',            
        ],
        4 => [
            'page_id'   =>  1,
			'parent_id' =>  2,            
			'type'      =>  2,
            'position'  =>  1,
            'x_size'    =>  12,
            'y_size'    =>  100,
            'content'   =>  '<p>CMS written by Luke Snider</p>',            
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach($this->rows AS $id => $row)
		{
			DB::table('pages_elements')->insert([
				'id'        => $id,                
                'page_id'   => $row['page_id'],
				'type'      => $row['type'],
				'position'  => $row['position'],                
			]);
        }
		foreach($this->columns AS $id => $column)
		{
			DB::table('pages_elements')->insert([
                'id'        => $id,
                'page_id'   => $column['page_id'],
				'parent_id' => $column['parent_id'],                
				'type'      => $column['type'],
				'position'  => $column['position'],
				'x_size'    => $column['x_size'],
				'y_size'    => $column['y_size'],
                'content'   => $column['content'], 
				'type'      => $column['type'],                
			]);
		}
    }
}
