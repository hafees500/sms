<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    DB::table('terms')->insert([
        ['name' => 'Term One',
        'status' => 10,],
        ['name' => 'Term Two',
        'status' => 10,]
    ]);
}
