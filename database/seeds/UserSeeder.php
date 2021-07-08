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
            'name' => 'Administrador',
            'username' => 'administrador',
            'email' => 'admin@email.com',
            'password' => 12345678
        ])->roles()->attach(1);
    }
}
