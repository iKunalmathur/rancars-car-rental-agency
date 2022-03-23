<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('roles')->insert([
            [
                "uuid" => (string) Str::uuid(),
                "title" => "admin",
            ], [
                "uuid" => (string) Str::uuid(),
                "title" => "owner",
            ], [
                "uuid" => (string) Str::uuid(),
                "title" => "customer",
            ]
        ]);
    }
}
