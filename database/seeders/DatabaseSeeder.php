<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        File::cleanDirectory("storage/app/public");

        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            CarsTableSeeder::class,
        ]);
    }
}
