<?php

use Illuminate\Database\Seeder;
use CodeEducation\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        
        factory('CodeEducation\Category', 15)->create();
    }
}
