<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    protected $users = [
        1 => [
            'name'      =>  'Luke Snider',
            'email'     =>  'luke946@gmail.com',
            'password'  =>  '$2y$10$v7zNyEa4gFGeql.RcKWq6O.rtAue7iTPkvkZS8aVm5xZSQ12tUa2i',
        ],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach($this->users AS $id	=>	$user)
		{
			DB::table('users')->insert([
				'id' 		    => $id,
                'name' 		    => $user['name'],  
                'email' 		=> $user['email'],               
                'password' 		=> $user['password'],                               
				'created_at' 	=> date("Y-m-d H:i:s"),
				'updated_at' 	=> date("Y-m-d H:i:s"),
			]);
        }    }
}
