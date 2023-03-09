<?php

namespace App\Http\Controllers;

use App\Services\BarangService;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function __construct(BarangService $barangService)
    {
        $this->barangService = $barangService;
    }

    public function index()
    {
        $barang = $this->barangService->handleGetAllBarang();
        return view('master.barang.index', [
            'barang' => $barang,
        ]);
    }

    public function getAllBarangApi()
    {
        return response()->JSON($this->barangService->handleGetAllLelang(), 200);
    }
}
