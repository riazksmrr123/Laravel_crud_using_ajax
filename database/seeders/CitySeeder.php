<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Cities = [

            [
                'name' => 'Narowal',
            ],
            [
                'name' => 'Zafarwal',
            ],
            [
                'name' => 'Lahore',
            ],
            [
                'name' => 'Rawalpindi',
            ],
            [
                'name' => 'karachi',
            ],
            [
                'name' => 'Islamabad',
            ]
        ];

        City::insert($Cities);
    }
}
