<?php

namespace Database\Seeders;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Budi Sudarsono',
                'username' => 'BudiSDS',
                'password' => bcrypt('12345'),
                'no_telp' => '085683849542',
            ],
            [
                'name' => 'Ponaryo Astaman',
                'username' => 'AryoAstaman',
                'password' => bcrypt('12345'),
                'no_telp' => '085433849222',
            ],
            [
                'name' => 'Bambang Pamungkas',
                'username' => 'BangPamungkas',
                'password' => bcrypt('12345'),
                'no_telp' => '085686749992',
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }

        $petugas = [
            [
                'name' => 'Petugas Satu',
                'username' => 'Petugas1',
                'password' => bcrypt('12345'),
                'level' => 'petugas',
            ],
            [
                'name' => 'Petugas Dua',
                'username' => 'Petugas2',
                'password' => bcrypt('12345'),
                'level' => 'petugas',
            ],
            [
                'name' => 'Admin',
                'username' => 'Admin',
                'password' => bcrypt('12345'),
                'level' => 'administrator',
            ],
        ];

        foreach ($petugas as $key => $value) {
            Petugas::create($value);
        }
    }
}
