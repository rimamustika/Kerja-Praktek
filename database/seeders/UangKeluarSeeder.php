<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UangKeluar;

class UangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = UangKeluar::insert([
            [
                'jumlah' => '2000000',
                'tanggal' =>'20 Ppril 2024',
                'keterangan_pengeluaran' => 'Pembayaran Listrik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
