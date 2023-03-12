<?php

namespace App\Http\Controllers;

use App\Services\BarangService;
use App\Services\LelangService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LelangService $lelangService, BarangService $barangService, UserService $userService)
    {
        // $this->middleware('auth');
        $this->lelangService = $lelangService;
        $this->barangService = $barangService;
        $this->userService = $userService;
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
        $user = $this->userService->handleGetAllUser();
        return view('home', [
            'lelang' => $lelang,
            'barang' => $barang,
            'user' => $user,
        ]);
    }
}
