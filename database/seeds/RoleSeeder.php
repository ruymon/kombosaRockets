<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(['admin','user'] as $name) {
            \Spatie\Permission\Models\Role::create([
                'name' => $name
            ]);
        }
    }
}
