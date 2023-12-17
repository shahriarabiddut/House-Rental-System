<?php

namespace Database\Seeders;

use App\Models\SiteOption;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $options = [
            [
                'name' => 'title',
                'value' => 'House Rental'
            ],
            [
                'name' => 'logo',
                'value' => 'img/justcse.png'
            ],
            [
                'name' => 'systemname',
                'value' => 'Dashboard'
            ],
            [
                'name' => 'bgimage',
                'value' => 'storage/images/bglogin.jpg'
            ],
            [
                'name' => 'contactemail',
                'value' => 'contactemail@gmail.com'
            ],
            [
                'name' => 'contactphone',
                'value' => '01945506778'
            ],
            [
                'name' => 'address',
                'value' => 'Cumilla,Chattogram,Bangladesh'
            ],
        ];
        SiteOption::insert($options);
    }
}
