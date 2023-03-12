<?php

namespace App\Services;

use App\Models\User;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PetugasService
{
    public function __construct(Petugas $petugas, User $user)
    {
        $this->petugas = $petugas;
        $this->user = $user;
    }
    
    public function handleGetAllPetugas()
    {
        $data = $this->petugas->all();
        return $data;
    }

    public function handlePostPetugas($request)
    {
        $petugas = $this->petugas->create([
            'username' => $request['username'],
        ]);
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'petugas_id' => $petugas->id,
            'level' => $request['level'],
        ]);
    }
}