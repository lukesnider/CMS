<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ConfigurationsTableSeeder extends Seeder
{
	
	protected $configs	=	[
		'theme_path'	=>	'resources/views',
		'index_page'	=>	1,
	];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach($this->configs AS $config	=>	$value)
		{
			DB::table('configurations')->insert([
				'config' 		=> $config,
				'value' 		=> $value,
				'created_at' 	=> date("Y-m-d H:i:s"),
				'updated_at' 	=> date("Y-m-d H:i:s"),
			]);
		}
    }
}
