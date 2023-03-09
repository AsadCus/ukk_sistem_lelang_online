<?php

namespace App\Services;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangService
{
    public function __construct(Barang $barang)
    {
        $this->barang = $barang;
    }
    
    public function handleGetAllBarang()
    {
        $data = $this->barang->all();
        return $data;
    }
}