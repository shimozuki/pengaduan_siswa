<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterMasyarakatRequest;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate(Request $r)
    {
        $r->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $masyarakat = Masyarakat::where('username', $r->username)->first();
        if ($masyarakat == null) { } 
        elseif (Hash::check($r->password, $masyarakat->password)) {
            return response()->json($masyarakat, 200);
        }
        return response()->json([
            'status' => 'failed'
        ], 422);
    }

    public function register(RegisterMasyarakatRequest $r)
    {
        $masyarakat = tap(Masyarakat::create([
            'nik' => $r->nik,
            'username' => $r->username,
            'password' => Hash::make($r->password),
            'nama' => $r->name,
            'telp' => $r->telp,
        ]));
        return response()->json([
            'status' => 'success',
            'Message' => 'register success',
            'data' => $masyarakat->fresh()
        ], 201);
    }
}
