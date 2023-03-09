<?php

namespace App\Services;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasService
{
    public function __construct(Petugas $petugas)
    {
        $this->petugas = $petugas;
    }
    
    public function handleGetAllPetugas()
    {
        $data = $this->petugas->all();
        return $data;
    }
}