<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	$roles = [
            ['guard_name' => 'web', 'name' => 'admin'],
        	['guard_name' => 'web', 'name' => 'client'],
        ];

        \Spatie\Permission\Models\Role::insert($roles);
    }
}
