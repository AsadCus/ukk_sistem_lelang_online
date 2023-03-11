<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
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
        $petugas = [
            [
                'username' => 'Petugas1',
            ],
            [
                'username' => 'Petugas2',                
            ],
            [
                'username' => 'Admin',
            ],
        ];

        foreach ($petugas as $key => $value) {
            Petugas::create($value);
        }

        $masyarakat = [
            [
                'username' => 'BudiSDS',
                'no_telp' => '085683849542',
            ],
            [
                'username' => 'AryoAstaman',
                'no_telp' => '085433849222',                
            ],
            [
                'username' => 'BangPamungkas',
                'no_telp' => '085686749992',
            ],
        ];

        foreach ($masyarakat as $key => $value) {
            Masyarakat::create($value);
        }

        $users = [
            [
                'name' => 'Budi Sudarsono',
                'email' => 'budisds@gmail.com',
                'password' => bcrypt('12345'),
                'masyarakat_id' => 1,
                'level' => 'masyarakat',
            ],
            [
                'name' => 'Ponaryo Astaman',
                'email' => 'aryoastaman@gmail.com',
                'password' => bcrypt('12345'),
                'masyarakat_id' => 2,
                'level' => 'masyarakat',
            ],
            [
                'name' => 'Bambang Pamungkas',
                'email' => 'bangpamungkas@gmail.com',
                'password' => bcrypt('12345'),
                'masyarakat_id' => 3,
                'level' => 'masyarakat',
            ],
            [
                'name' => 'Petugas Satu',
                'email' => 'petugas1@gmail.com',
                'password' => bcrypt('12345'),
                'petugas_id' => 1,
                'level' => 'petugas',
            ],
            [
                'name' => 'Petugas Dua',
                'email' => 'petugas2@gmail.com',
                'password' => bcrypt('12345'),
                'petugas_id' => 2,
                'level' => 'petugas',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'petugas_id' => 3,
                'level' => 'administrator',
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
