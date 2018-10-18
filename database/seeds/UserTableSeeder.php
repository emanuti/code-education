<?php

use Illuminate\Database\Seeder;
Use Faker\Factory;
Use CodeEducation\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'emanuti',
            'email' => 'emanu.ti@gmail.com',
            'password' => Hash::make(123456)
        ]);

        $faker = Factory::create();

        foreach(range(1,15) as $i) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make(123456)
            ]);
        }
    }
}
