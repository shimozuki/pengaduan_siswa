<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterMasyarakatRequest;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages/register');
    }

    public function store(RegisterMasyarakatRequest $r)
    {
        Masyarakat::create([
            'nik' => $r->nik,
            'username' => $r->username,
            'password' => Hash::make($r->password),
            'nama' => $r->name,
            'telp' => $r->telp,
        ]);
        return redirect('login')->with("success", "Register berhasil");
    }
}
