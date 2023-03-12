<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LelangService;
use Illuminate\Support\Facades\Auth;

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

    public function bid(Request $request, $id)
    {
        $this->lelangService->handleBidLelang($request, $id);
        return back();
    }

    public function bukaLelang($id, $request)
    {
        $this->lelangService->handleBuka($id, $request);
        return back();
    }

    public function getAllLelangApi()
    {
        return response()->JSON($this->lelangService->handleGetAllLelang(), 200);
    }
}
