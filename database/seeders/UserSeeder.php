<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $gironi = DB::table('gironi')->pluck('id_girone');


       
            $admin = [
                'name' => 'admin',
                'email' => 'pallavolotest@test.com',
                'password' => bcrypt('123456789'),
                // altre colonne se necessario
            ];
        

        DB::table('users')->insert($admin);
    }
}
