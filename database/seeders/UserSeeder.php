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
            'name' => 'Shahriar Ahmed',
            'email' => 'shahriarabiddut@gmail.com',
            'type' => 'owner',
            'password' => bcrypt('Password')
        ];
        User::insert($student);
    }
}
