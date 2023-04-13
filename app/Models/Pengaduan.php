<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $primaryKey  = 'id_pengaduan';

    protected $fillable     = [
        'judul_laporan',
        'isi_laporan',
        'foto',
        'tgl_pengaduan',
        'status',
        'nik'
    ];


    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan');
    }

    public function pengadu()
    {
        return $this->belongsTo(Masyarakat::class, 'nik');
    }
}
