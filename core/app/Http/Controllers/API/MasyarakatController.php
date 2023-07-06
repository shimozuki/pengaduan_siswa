<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengaduanResource;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class MasyarakatController extends Controller
{
    public function index($nik)
    {
        $masyarakat = Masyarakat::findorfail($nik);
        return response()->json([
            "nik" => $masyarakat->nik,
            "nama" => $masyarakat->nama,
            "username" => $masyarakat->username,
            "telp" => $masyarakat->telp,
            "created_at" => $masyarakat->created_at,
            "updated_at" => $masyarakat->updated_at
        ], 200);
    }

    public function addPengaduan(Request $r)
    {
        $r->validate([
            'nik' => 'required',
            'judul_laporan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required|max:2048|mimes:png,jpg|image',
        ]);
        $filename = time() . "-pengaduan." . $r['foto']->getClientOriginalExtension();
        Storage::disk('public')->putFileAs("images", $r['foto'], $filename);
        Pengaduan::create([
            'judul_laporan' => str_replace('"', "", $r->judul_laporan),
            'isi_laporan' => str_replace('"', "", $r->isi_laporan),
            'foto' => $filename,
            'tgl_pengaduan' => now(),
            'status' => '0',
            'nik' => str_replace('"', "", $r->nik)
        ]);
        return response()->json(['message' => "success"], 200);
    }

    public function getPengaduanUser($id)
    {
        $pengaduan = Pengaduan::with('tanggapan')->where('nik', $id)->latest()->simplePaginate();
        // info($pengaduan);
        return response()->json([
            'message' => "success",
            'data' => PengaduanResource::collection($pengaduan)
        ], 200);
    }
    public function getPengaduanbyID($id)
    {
        $pengaduan = Pengaduan::with('tanggapan')->findOrFail($id);
        info($pengaduan);
        return response()->json(
            new PengaduanResource($pengaduan),
            200
        );
    }
}
