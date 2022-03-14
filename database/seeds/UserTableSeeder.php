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
        DB::table('users')->insert([
            'username' => 'test',
            'mail' => 'test@test',
            'password' => 'test',
            'bio' => 'test',
            'images' => 'dawn.png'
        ]);
    }
}
