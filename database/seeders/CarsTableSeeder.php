<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Car::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        /* Seed cars */

        DB::table("cars")->insert([
            [
                "uuid" => (string) Str::uuid(),
                'owner_id' => 2,
                'name' => "Hyundai i10 (Petrol)",
                'model' => "Manual petrol",
                'plate_number' => "DL870902",
                'rent' => 666,
                'status' => 0,
                'seating_capacity' => 4,
            ],
            [
                "uuid" => (string) Str::uuid(),
                'owner_id' => 2,
                'name' => "Mahindra KUV100",
                'model' => "Manual Diesel",
                'plate_number' => "UK879374",
                'rent' => 777,
                'status' => 0,
                'seating_capacity' => 5,
            ],

        ]);
    }
}
