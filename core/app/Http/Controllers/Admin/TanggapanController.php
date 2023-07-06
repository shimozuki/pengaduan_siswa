<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TanggapanController extends Controller
{
    public function postTanggapan(Request $r, $id)
    {
        $r->validate([
            'tanggapan' => ['required'],
        ]);
        Tanggapan::create([
            'tanggapan' => $r->tanggapan,
            'tgl_tanggapan' => now('Asia/Jakarta'),
            'id_pengaduan' => $id,
            'id_petugas' => auth('petugass')->user()->id_petugas,
        ]);
        DB::select("CALL update_pengaduan_status('$id', 'Selesai')");

        return redirect('pengaduan/terverifikasi');
    }
}
