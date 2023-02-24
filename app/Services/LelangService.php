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
}