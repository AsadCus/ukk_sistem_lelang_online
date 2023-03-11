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

    public function create()
    {
        return view('master.barang.create');
    }

    public function store(Request $request)
    {
        $this->barangService->handleStoreBarang($request);
        return redirect()->route('master.barang.index');
    }

    public function getAllBarangApi()
    {
        return response()->JSON($this->barangService->handleGetAllLelang(), 200);
    }
}
