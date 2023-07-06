<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;
    protected $primaryKey  = 'id_tanggapan';
    protected $fillable = [
        'tanggapan',
        'id_pengaduan',
        'id_petugas',
        'tgl_tanggapan',
    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
}
