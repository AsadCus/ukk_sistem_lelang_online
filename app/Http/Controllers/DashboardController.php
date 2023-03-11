<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BarangService;
use App\Services\LelangService;
use Illuminate\Support\Facades\Auth;

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
}
