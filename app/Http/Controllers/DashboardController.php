<?php

namespace App\Http\Controllers;

use App\Services\BarangService;
use App\Services\LelangService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(LelangService $lelangService, BarangService $barangService)
    {
        $this->lelangService = $lelangService;
        $this->barangService = $barangService;
    }

    public function dashboard()
    {
        $lelang = $this->lelangService->handleGetAllLelang();
        $barang = $this->barangService->handleGetAllBarang();
        return view('master.dashboard', [
            'lelang' => $lelang,
            'barang' => $barang,
        ]);
    }

    public function home()
    {
        $lelang = $this->lelangService->handleGetAllLelang();
        $barang = $this->barangService->handleGetAllBarang();
        return view('user.dashboard', [
            'lelang' => $lelang,
            'barang' => $barang,
        ]);
    }
}
