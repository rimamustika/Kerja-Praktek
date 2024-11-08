<?php

namespace Database\Seeders;

use App\Models\UangMasuk;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class UangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('uang_masuks')->insert(
            [
                [ 
                'jumlah' => '300000',
                'tanggal' =>'2024-04-20',
                'keterangan_pemasukan' => 'Pembuatan Aplikasi',
                'created_at' => now(),
                'updated_at' => now(),
                ],
            ]
        );
    }
}
