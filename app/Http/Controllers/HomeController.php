<?php

namespace App\Http\Controllers;

use App\Services\BarangService;
use App\Services\LelangService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LelangService $lelangService, BarangService $barangService)
    {
        // $this->middleware('auth');
        $this->lelangService = $lelangService;
        $this->barangService = $barangService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lelang = $this->lelangService->handleGetAllLelang();
        $barang = $this->barangService->handleGetAllBarang();
        return view('home', [
            'lelang' => $lelang,
            'barang' => $barang,
        ]);
    }
}
