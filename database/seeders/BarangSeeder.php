<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Motor Vespa 2013',
                'description' => 'Motor merek vespat keluaran tahun 2013. Kondisi body baik, mesin rusak.',
                'initial_price' => 1800000,
            ],
            [
                'name' => 'Mobil BMW rusak',
                'description' => 'Rongsokan utuh mobil bmw. rangka mobil dalam kondisi baik.',
                'initial_price' => 24500000,
            ],
            [
                'name' => 'Selusin kipas angin merek panasonic',
                'description' => 'Selusin kipas angin lengkap. Sudah tidak berfungsi.',
                'initial_price' => 300000,
            ],
        ];

        foreach ($items as $key => $value) {
            Barang::create($value);
        }
    }
}
