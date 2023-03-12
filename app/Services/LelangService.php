<?php

namespace App\Services;

use App\Models\HistoryLelang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LelangService
{
    public function __construct(Lelang $lelang, HistoryLelang $historyLelang)
    {
        $this->lelang = $lelang;
        $this->historyLelang = $historyLelang;
    }
    
    public function handleGetAllLelang()
    {
        $data = $this->lelang->get();
        return $data;
    }

    public function handleGetHistoryLelang($id)
    {
        $data = $this->historyLelang->where('lelang_id', $id)->orderBy('id', 'desc')->get();
        return $data;
    }

    public function handleGetLelang($id)
    {
        $data = $this->lelang->find($id);
        return $data;
    }

    public function handleBidLelang($request, $id)
    {
        $this->historyLelang->create([
            'lelang_id' => $id,
            'barang_id' => $request->barang_id,
            'user_id' => Auth::user()->id,
            'price_quotation' => $request->price_quotation,
        ]);
    }

    public function handleBuka($id, $request)
    {
        dd($id);
    }
}