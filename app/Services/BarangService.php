<?php

namespace App\Services;

use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangService
{
    public function __construct(Barang $barang, Lelang $lelang)
    {
        $this->barang = $barang;
        $this->lelang = $lelang;
    }
    
    public function handleGetAllBarang()
    {
        $data = $this->barang->all();
        return $data;
    }

    public function handleStoreBarang($request)
    {
        $barang = $this->barang->create([
            'name' => $request->name,
            'description' => $request->description,
            'initial_price' => $request->initial_price,
        ]);

        $lelang = $this->lelang->create([
            'barang_id' => $barang->id,
            'status' => 'close',
        ]);

        return $lelang;
    }
}