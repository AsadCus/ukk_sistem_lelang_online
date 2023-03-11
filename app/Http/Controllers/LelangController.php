<?php

namespace App\Http\Controllers;

use App\Services\LelangService;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    public function __construct(LelangService $lelangService)
    {
        $this->lelangService = $lelangService;
    }

    public function index()
    {
        $lelang = $this->lelangService->handleGetAllLelang();
        return view('master.lelang.index', [
            'lelang' => $lelang,
        ]);
    }

    public function detailLelang($id)
    {
        $historyLelang = $this->lelangService->handleGetHistoryLelang($id);
        $lelang = $this->lelangService->handleGetLelang($id);
        return view('user.detail-lelang', [
            'lelang' => $lelang,
            'historyLelang' => $historyLelang,
        ]);
    }

    public function getAllLelangApi()
    {
        return response()->JSON($this->lelangService->handleGetAllLelang(), 200);
    }
}
