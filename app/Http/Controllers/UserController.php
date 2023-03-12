<?php

namespace App\Http\Controllers;

use App\Services\PetugasService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserService $userService, PetugasService $petugasService)
    {
        $this->userService = $userService;
        $this->petugasService = $petugasService;
    }

    public function indexPetugas()
    {
        $petugas = $this->petugasService->handleGetAllPetugas();
        return view('master.user.index', [
            'petugas' => $petugas,
        ]);
    }

    public function registrasiViaAdmin(Request $request)
    {
        $this->petugasService->handlePostPetugas($request);
        return back();
    }
}
