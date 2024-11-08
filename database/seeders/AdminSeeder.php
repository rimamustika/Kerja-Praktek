<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = User::create([
            'name' => 'rima',
            'email' => 'rimamustika@gmail.com',
            'password' => Hash::make('mustika20'),
        ]);

        $owner->assignRole('owner');

        $stafKeuangan = User::create([
            'name' => 'staf',
            'email' => 'staf@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        $stafKeuangan->assignRole('stafKeuangan');

        // DB::table('users')->insert([
            // 'name' => 'rima',
            // 'email' => 'rimamustika@gmail.com',
            // 'password' => Hash::make('mustika20'),

        // ]);
    }
}
