<?php

namespace App\Http\Controllers;

use App\Services\LelangService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(LelangService $lelangService)
    {
        $this->lelangService = $lelangService;
    }

    public function index()
    {
        $lelang = $this->lelangService->handleGetAllLelang();
        return view('home', [
            'lelang' => $lelang,
        ]);
    }
}
