<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* DB::table('jadwals')->insert([
            'siswa' => 'Jayden',
            'karyawan' => 'Steven',
            'mata_pelajaran' => 'Fisika',
        ]); */

        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 20; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('jadwals')->insert([
    			'siswa' => $faker->siswa,
    			'karyawan' => $faker->karyawan,
    			'mata_pelajaran' => $faker->mata_pelajaran,
    		]);
        }
    }
}
