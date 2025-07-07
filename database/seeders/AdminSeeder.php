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
            'nama_lengkap' => 'Admin Restis Batik',
            'telepon' => '081246833799',
            'jenis_kelamin' => 'Perempuan',
            'email' => 'reztisbatik@gmail.com',
            'password' => Hash::make('12341234'),
        ]);
    }
}