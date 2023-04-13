<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    public function getPengaduanBaru()
    {
        $pengaduan = Pengaduan::with('tanggapan')->where('status', '0')->latest()->get();

        return view('pages/data-pengaduan', ['pengaduan' => $this->encodeImage($pengaduan), 'title' => "Baru"]);
    }

    public function getPengaduanVerifikasi()
    {
        $pengaduan = Pengaduan::with("pengadu")->where('status', 'Proses')->latest()->get();
        info($pengaduan);
        return view('pages/data-pengaduan', ['pengaduan' => $this->encodeImage($pengaduan), 'title' => "Terverifikasi"]);
    }

    public function getPengaduanSelesai()
    {
        $pengaduan = Pengaduan::with(['tanggapan', 'pengadu'])->where('status', 'Selesai')->latest()->get();

        return view('pages/data-pengaduan', ['pengaduan' => $this->encodeImage($pengaduan), 'title' => "Selesai"]);
    }
    public function encodeImage($pengaduan)
    {
        foreach ($pengaduan as $key => $value) {
            $imagePath = public_path("storage/images/" . $pengaduan[$key]->foto);
            $image = "data:image/png;base64," . base64_encode(file_get_contents($imagePath));
            $pengaduan[$key]->foto = $image;
        }
        return $pengaduan;
    }
    public function verifikasiPengaduan($id)
    {
        DB::select("CALL update_pengaduan_status('$id', 'Proses')");

        return redirect('pengaduan/baru');
    }
}
