<?php

use Illuminate\Database\Seeder;

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

        factory('CodeEducation\User')->create([
            'name' => 'emanuti',
            'email' => 'emanu.ti@gmail.com',
            'password' => Hash::make(123456)
        ]);
        factory('CodeEducation\User', 10)->create();
    }
}
