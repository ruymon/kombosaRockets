<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@email.com',
            'password' => 123
        ])->roles()->attach(1);
    }
}
