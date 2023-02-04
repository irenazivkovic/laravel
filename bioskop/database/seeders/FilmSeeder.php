<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            'naziv' => 'Zona Zamfirova',
            'reziser' => 'Zdravko Sotra',
            'godina' => 2002,
        ]);
    }
}
