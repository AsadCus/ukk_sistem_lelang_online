<?php

namespace App\Services;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function __construct(User $user, Petugas $petugas)
    {
        $this->user = $user;
        $this->petugas = $petugas;
    }
    
    public function handleGetAllUser()
    {
        $data = $this->user->all();
        return $data;
    }
}