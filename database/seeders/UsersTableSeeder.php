<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
                'name' => 'admin',
                'national_id' => '123456789',
                'job' => 'trader',
                'phone' => '01234567890',
                'password' => \Hash::make('12345678'),
                'floor' => '4',
                'building' => '26',
                'street' => 'el thalatheny',
                'area' => 'Omrania',
                'city' => 'Giza',
                // 'api_token' => hash('sha256', Str::random(60)),
                // 'api_token' => 'BL302k8L6FhYvunJYG5La9nK76bakkujEPyoAZWuihV4nW4ZPHensXDBOR46', // str_random(60)
            ],
        ];

        foreach ($users as $value)
        	\App\Models\User::create($value)->assignRole('admin');
    }
}
