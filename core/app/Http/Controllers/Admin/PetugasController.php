<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::get();
        return view('pages/data-petugas', ['petugas' => $petugas, 'level' => ['admin', 'petugas']]);
    }
    public function store(Request $r)
    {
        $r->validate([
            'nama_petugas' => ['required'],
            'username' => ['required', 'unique:petugas,username'],
            'password' => ['required'],
            'telp' => ['required'],
            'level' => ['required'],
        ]);
        Petugas::create([
            'nama_petugas' => $r->nama_petugas,
            'username' => $r->username,
            'password' => Hash::make($r->password),
            'telp' => $r->telp,
            'level' => $r->level,
        ]);
        return redirect('admin/petugas');
    }

    public function update(Request $r, $id)
    {
        info($r);
        $r->validate([
            'nama_petugas' => ['required'],
            'username' => ['required', 'unique:petugas,username,' . $id . ',id_petugas'],
            // 'password' => ['required'],
            'telp' => ['required'],
            'level' => ['required'],
        ]);
        Petugas::findorfail($id)->update([
            'nama_petugas' => $r->nama_petugas,
            'username' => $r->username,
            // 'password' => encrypt($r->password),
            'telp' => $r->telp,
            'level' => $r->level,
        ]);
        return redirect('admin/petugas');
    }
    public function delete($id)
    {
        Petugas::findorfail($id)->delete();
        return redirect('admin/petugas');
    }
}
