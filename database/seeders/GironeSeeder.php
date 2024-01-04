<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GironeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gironi = ['A', 'B', 'C'];

        $totalGironi = count($gironi);

        for ($i = 0; $i < $totalGironi; $i++) {
            $girone = $gironi[$i];

            DB::table('gironi')->insert([
                'nome' => $girone,
                // altre colonne se necessario
            ]);
        }
    }
}
