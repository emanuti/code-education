<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
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
        $faker = Factory::create();

        DB::table('categories')->truncate();

        for($i = 0;$i < 10;$i++) {
            Category::create([
                'name'        => $faker->word(),
                'description' => $faker->sentence()
            ]);
        }
    }
}
