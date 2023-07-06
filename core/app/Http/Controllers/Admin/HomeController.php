<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = array_fill(1, date('m'), 0);
        $results = Pengaduan::select(
            DB::raw("DATE_FORMAT(created_at, '%m-%Y') as month"),
            DB::raw("(COUNT(*)) as pengaduan"),
        )->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->get();
        foreach ($results as $key => $value) {
            $data[(intval($value->month))] = $results[$key]->pengaduan;
        }

        $jumlahPengaduan = Pengaduan::count();
        $jumlahPengaduanDiBaru = Pengaduan::where('status', '0')->count();
        $jumlahPengaduanDiproses = Pengaduan::where('status', 'Proses')->count();
        $jumlahPengaduanSelesai = Pengaduan::where('status', 'Selesai')->count();
        return view('pages/home', ["data" => $data, "semua" => $jumlahPengaduan, "baru" => $jumlahPengaduanDiBaru, "proses" => $jumlahPengaduanDiproses, "selesai" => $jumlahPengaduanSelesai]);
    }

    public function getPengaduanBaru()
    {
        $pengaduan = Pengaduan::where('status', '0')->get();

        return view('pages/data-pengaduan-verifikasi', ['pengaduan' => $pengaduan]);
    }

    public function getPengaduanVerifikasi()
    {
        $pengaduan = Pengaduan::where('status', 'Proses')->get();

        return view('pages/data-pengaduan-tanggapan', ['pengaduan' => $pengaduan]);
    }

    public function verifikasiPengaduan($id)
    {
        DB::select("CALL update_pengaduan_status('$id', 'Proses')");

        return redirect('pengaduan/baru');
    }
}
