<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$oOhE/tcF8MC9crGCw/Zv5.zFMGu0JLm591undChCaHJM6YrnGjgCu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

        //TAHUNSELEKSI SEEDER
        DB::table('thseleksi')->insert([
            'tahun' => 2020,
            'status' => 'Proses',
            'kuota' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

         DB::table('thseleksi')->insert([
            'tahun' => 2021,
            'status' => 'Proses',
            'kuota' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

         //KRITERIA
        DB::table('kriteria')->insert([
            'id' => 1,
            'nama' => 'IPK',
            'nilai' => '4',
            'thseleksi_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

        DB::table('kriteria')->insert([
            'id' => 2,
            'nama' => 'KEAKTIFAN',
            'nilai' => '3',
            'thseleksi_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

         DB::table('kriteria')->insert([
             'id' => 3,
             'nama' => 'KONDISI KELUARGA',
             'nilai' => '3',
             'thseleksi_id' => '1',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
          ]);

         DB::table('kriteria')->insert([
            'id' => 4,
            'nama' => 'PENGHASILAN ORANG TUA',
            'nilai' => '4',
            'thseleksi_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

         DB::table('kriteria')->insert([
            'id' => 5,
            'nama' => 'PRESTASI NON AKADEMIK',
            'nilai' => '4',
            'thseleksi_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);




        //IPK
        DB::table('kriteriadetail')->insert([
            [
                'kriteria_id' => 1,
                'nama' => '=4',
                'bobot' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 1,
                'nama' => '>3 dan <4',
                'bobot' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 1,
                'nama' => '>2 dan <3',
                'bobot' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 1,
                'nama' => '>1 dan <2',
                'bobot' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 1,
                'nama' => '<1',
                'bobot' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            ]);


        //KEAKTIFAN
        DB::table('kriteriadetail')->insert([
            [
                'kriteria_id' => 2,
                'nama' => 'Sangat Aktif',
                'bobot' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 2,
                'nama' => 'Lebih Aktif',
                'bobot' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 2,
                'nama' => 'Cukup Aktif',
                'bobot' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 2,
                'nama' => 'Kurang Aktif',
                'bobot' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 2,
                'nama' => 'Sangat Tidak Aktif',
                'bobot' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            ]);


        //KONDISI KELUARGA
        DB::table('kriteriadetail')->insert([
            [
                'kriteria_id' => 3,
                'nama' => '5',
                'bobot' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 3,
                'nama' => '4',
                'bobot' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 3,
                'nama' => '3',
                'bobot' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 3,
                'nama' => '2',
                'bobot' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 3,
                'nama' => '1',
                'bobot' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            ]);


        //PENGHASILANKOTOR
        DB::table('kriteriadetail')->insert([
            [
                'kriteria_id' => 4,
                'nama' => '>Rp 5.000.000,00',
                'bobot' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 4,
                'nama' => '>Rp 4.000.000,00 dan <Rp 5.000.000,00',
                'bobot' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 4,
                'nama' => '>Rp 3.000.000,00 dan <Rp 4.000.000,00',
                'bobot' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 4,
                'nama' => '>Rp 1.000.000,00 dan <Rp 3.000.000,00',
                'bobot' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 4,
                'nama' => '<Rp 1.000.000,00',
                'bobot' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            ]);

        //PRESTASINONAKADEMIK
        DB::table('kriteriadetail')->insert([
            [
                'kriteria_id' => 5,
                'nama' => '>=5',
                'bobot' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 5,
                'nama' => '4',
                'bobot' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 5,
                'nama' => '3',
                'bobot' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 5,
                'nama' => '2',
                'bobot' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria_id' => 5,
                'nama' => '<=1',
                'bobot' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            ]);

    }
}
