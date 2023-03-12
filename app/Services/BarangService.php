<?php

namespace App\Services;

use App\Models\Barang;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangService
{
    public function __construct(Barang $barang, Lelang $lelang, HistoryLelang $historyLelang)
    {
        $this->barang = $barang;
        $this->lelang = $lelang;
        $this->historyLelang = $historyLelang;
    }
    
    public function handleGetAllBarang()
    {
        $data = $this->barang->all();
        return $data;
    }

    public function handleStoreBarang($request)
    {
        $barang = $this->barang->create([
            'name' => $request->name,
            'description' => $request->description,
            'initial_price' => $request->initial_price,
        ]);

        $lelang = $this->lelang->create([
            'barang_id' => $barang->id,
            'status' => $request->status,
        ]);

        return $lelang;
    }

    public function handleGetBarang($id)
    {
        $barang = $this->barang->find($id);
        return $barang;
    }

    public function handlePutUpdateBarang($id, $request)
    {
        $this->barang->find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'initial_price' => $request->initial_price,
        ]);

        $lelang = $this->lelang->find($request->lelang_id)->update([
            'status' => $request->status,
        ]);

        return $lelang;
    }

    public function handleDeleteBarang($id, $request)
    {
        $dataDetailLelang = $this->historyLelang->where('lelang_id', $request->lelang_id)->get();
        if ($dataDetailLelang) {
            foreach ($dataDetailLelang as $key => $ddlitem) {
                $this->historyLelang->find($ddlitem->id)->delete();
            }
        }
        $this->lelang->find($request->lelang_id)->delete();
        $data = $this->barang->find($id)->delete();
        return $data;
    }
}