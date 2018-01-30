<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;

class ElementsTableSeeder extends Seeder
{   
    protected $meta     = [
        2   =>   [
            'x'  =>  12,
        ],
        4   =>   [
            'x'  =>  12,
        ],
    ];
	protected $elements = [
        
        1   =>   [
            'page_id'       =>  1,
            'parent_id'     =>  null,
            'type'          =>  1,
            'position'      =>  1,
            'content'       =>  null            

        ],
        2   =>   [
            'page_id'       =>  1,
            'parent_id'     =>  1,
            'type'          =>  2,
            'position'      =>  1,
            'content'       =>  'resources/templates/index.blade.php' 
        ],
        3   =>   [
            'page_id'       =>  2,
            'parent_id'     =>  null,
            'type'          =>  1,
            'position'      =>  1,
            'content'       =>  null            

        ],
        4   =>   [
            'page_id'       =>  2,
            'parent_id'     =>  3,
            'type'          =>  2,
            'position'      =>  1,
            'content'       =>  'resources/templates/about.blade.php' 
        ],        
    
    ];
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		foreach($this->elements AS $key => $element)
		{
            $content = null;

            if(!is_null($element['content'])){
                $content = File::get($element['content']);
            }

			DB::table('pages_elements')->insert([
                'page_id'       =>  $element['page_id'],
                'parent_id'     =>  $element['parent_id'],
                'type'          =>  $element['type'],
                'position'      =>  $element['position'],
                'content'       =>  $content,
                'id'            =>  $key,

            ]);
            
            if(array_key_exists($key, $this->meta)){
                foreach($this->meta AS $index => $value){
                    foreach($value AS $inde => $val){
                        DB::table('pages_elements_meta')->insert([
                            'element_id' =>  $key,
                            'key'        =>  $inde,
                            'value'      =>  $val,        
                        ]);
                    }
                }
            }
		}
		
    
	}
}
