<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'nama_lengkap' => 'Ratih Ayu Maharani',
            'telepon' => '081234567890',
            'jenis_kelamin' => 'Perempuan',
            'email' => 'admin@reztisbatik.com',
            'password' => Hash::make('password123'),
        ]);
    }
}