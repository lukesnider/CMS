<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ConfigurationsTableSeeder::class);
        $this->call(PageStatusTableSeeder::class);
        $this->call(PagesElementsTypeTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(UsersTableSeeder::class);        
        
    }
}
