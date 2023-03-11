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
        $data = $this->lelang->all();
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
}