<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class SquadreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $squadre = [];

            $numeroSquadre = rand(20, 30); // Modifica questi valori a seconda del numero di squadre per ogni girone

            for ($i = 0; $i < $numeroSquadre; $i++) {
                $squadre[] = [
                    'nome' => $faker->unique()->company,
                    'citta' => $faker->city,
                    'punteggio' => rand(1, 100),
                    'id_girone' => null,
                    // altre colonne se necessario
                ];
            }

        DB::table('squadre')->insert($squadre);
    }
}
