<?php

namespace Database\Seeders;

use App\Models\Golfer;
use Illuminate\Database\Seeder;

class GolferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Golfer::create([
            'name' => 'Arno',
            'gender' => 'male',
            'handicap' => 22.8
        ]);

        Golfer::create([
            'name' => 'George',
            'gender' => 'male',
            'handicap' => 25.5
        ]);

        Golfer::create([
            'name' => 'Michiel',
            'gender' => 'male',
            'handicap' => 24.6
        ]);

        Golfer::create([
            'name' => 'Peter',
            'gender' => 'male',
            'handicap' => 23.8
        ]);

        Golfer::create([
            'name' => 'Sylvia',
            'gender' => 'female',
            'handicap' => 29.2
        ]);

        Golfer::create([
            'name' => 'Jan',
            'gender' => 'male',
            'handicap' => 26.5
        ]);

        Golfer::create([
            'name' => 'Bram',
            'gender' => 'male',
            'handicap' => 23.2
        ]);

        Golfer::create([
            'name' => 'Ruud',
            'gender' => 'male',
            'handicap' => 44.0
        ]);

        Golfer::create([
            'name' => 'Leon',
            'gender' => 'male',
            'handicap' => 18.4
        ]);

        Golfer::create([
            'name' => 'Bart',
            'gender' => 'male',
            'handicap' => 24.9
        ]);

        Golfer::create([
            'name' => 'Ornella',
            'gender' => 'female',
            'handicap' => 39.0
        ]);
    }
}
