<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function getPengaduan()
    {
        $pengaduan = Pengaduan::with('tanggapan.petugas')->where('nik', auth('masyarakats')->user()->nik)->get();
        info($pengaduan);
        return view('pages/pengaduan-saya', ['pengaduan' => $pengaduan]);
    }

    public function store(Request $r)
    {
        $r->validate([
            'judul_laporan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required|max:2046',
        ]);
        $filename = time() . "-pengaduan." . $r['foto']->getClientOriginalExtension();
        Storage::disk('public')->putFileAs("images", $r['foto'], $filename);

        Pengaduan::create([
            'judul_laporan' => $r->judul_laporan,
            'isi_laporan' => $r->isi_laporan,
            'foto' => $filename,
            'tgl_pengaduan' => now(),
            'status' => '0',
            'nik' => auth('masyarakats')->user()->nik
        ]);

        return redirect('home/masyarakat/pengaduansaya');
    }
}
