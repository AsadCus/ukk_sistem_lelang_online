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
        return $this->lelangService->get();
    }

    public function getAllLelangApi()
    {
        return response()->JSON($this->lelangService->handleGetAllLelang(), 200);
    }
}
