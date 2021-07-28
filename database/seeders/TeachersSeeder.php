<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            ['name' => 'Katie',
            'status' => 10,],
            ['name' => 'Max',
            'status' => 10,]
        ]);
    }
}
