<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::get();
        return view('pages/data-masyarakat', ['masyarakat' => $masyarakat, 'level' => ['admin', 'masyarakat']]);
    }
    public function store(Request $r)
    {
        info("delete");

        $r->validate([
            'nama' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'telp' => ['required'],
            'level' => ['required'],
        ]);
        Masyarakat::create([
            'nama' => $r->nama,
            'username' => $r->username,
            'password' => Hash::make($r->password),
            'telp' => $r->telp,
            'level' => $r->level,
        ]);
        return redirect('admin/masyarakat');
    }
    public function update(Request $r, $id)
    {
        info($r);
        $r->validate([
            'nama' => ['required'],
            'username' => ['required'],
            // 'password' => ['required'],
            'telp' => ['required'],
        ]);
        Masyarakat::findorfail($id)->update([
            'nama' => $r->nama,
            'username' => $r->username,
            // 'password' => encrypt($r->password),
            'telp' => $r->telp,
        ]);
        return redirect('admin/masyarakat');
    }
    public function delete($id)
    {
        Masyarakat::findorfail($id)->delete();
        return redirect('admin/masyarakat');
    }
}
