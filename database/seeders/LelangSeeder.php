<?php

namespace Database\Seeders;

use App\Models\HistoryLelang;
use App\Models\Lelang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LelangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lelangs = [
            [
                'barang_id' => 1,
                'user_id' => 3,
                'petugas_id' => 1,
                'final_price' => 2000000,
                'status' => 'close',
            ],
            [
                'barang_id' => 2,
                'user_id' => 1,
                'petugas_id' => 1,
                'final_price' => 27000000,
                'status' => 'inactive',
            ],
            [
                'barang_id' => 3,
                'user_id' => 1,
                'petugas_id' => 2,
                'final_price' => 300000,
                'status' => 'active',
            ],

        ];

        foreach ($lelangs as $key => $value) {
            Lelang::create($value);
        }
        
        $history = [
            [
                'lelang_id' => 1,
                'barang_id' => 1,
                'user_id' => 1,
                'price_quotation' => 1900000,
            ],
            [
                'lelang_id' => 1,
                'barang_id' => 1,
                'user_id' => 3,
                'price_quotation' => 2000000,
            ],
            [
                'lelang_id' => 2,
                'barang_id' => 2,
                'user_id' => 2,
                'price_quotation' => 25000000,
            ],
            [
                'lelang_id' => 2,
                'barang_id' => 2,
                'user_id' => 3,
                'price_quotation' => 25500000,
            ],
            [
                'lelang_id' => 2,
                'barang_id' => 2,
                'user_id' => 2,
                'price_quotation' => 26500000,
            ],
            [
                'lelang_id' => 2,
                'barang_id' => 2,
                'user_id' => 1,
                'price_quotation' => 27000000,
            ],
            [
                'lelang_id' => 3,
                'barang_id' => 3,
                'user_id' => 1,
                'price_quotation' => 300000,
            ],

        ];

        foreach ($history as $key => $value) {
            HistoryLelang::create($value);
        }
    }
}
