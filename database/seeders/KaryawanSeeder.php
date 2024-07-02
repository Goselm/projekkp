<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {         
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 20; $i++){
            DB::table('karyawans')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'gaji' => $faker->gaji,
            ]);
        }


         for($i = 1; $i <= 1000; $i++){
                Karyawan::create([
                    'name' => $faker->name,
                ]);
         }
         
    }
}
