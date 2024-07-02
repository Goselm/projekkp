<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 20; $i++){
            DB::table('siswas')->insert([
                'nama' => $faker->nama,
                'grade' => $faker->grade,
                'school' => $faker->school,
            ]);
        }
    }
}
