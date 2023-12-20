<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $student = [
            [
                'name' => 'Owner',
                'email' => 'owner@gmail.com',
                'type' => 'owner',
                'password' => bcrypt('ownerowner')
            ],
            [
                'name' => 'Tenant',
                'email' => 'tenant@gmail.com',
                'type' => 'tenant',
                'password' => bcrypt('tenant')
            ],
        ];
        User::insert($student);
    }
}
