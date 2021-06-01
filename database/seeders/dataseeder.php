<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class dataseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //  MAHASISWA SEEDER
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 25; $i++){
            // insert data ke table products menggunakan Faker
            DB::table('mahasiswa')->insert([
                'nim' => $faker->numberBetween(2522221,423230232323),
                'nama' => $faker->name,
                'jurusan' => $faker->randomElement(['SISTEM INFORMASI', 'TEKNIK INFORMATIKA','PENDIDIKAN MATEMATIKA','PGSD']),
                'jk' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'hp' => '0'.$faker->numberBetween(85123456789,85923456789),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
             ]);
         }

    }
}
