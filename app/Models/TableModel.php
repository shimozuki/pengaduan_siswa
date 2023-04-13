<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableModel extends Model
{
    use HasFactory;
    protected $table        = "karyawan";
    protected $primaryKey   = "id_karyawan";
    protected $fillable     = ['nama_karyawan', 'nama_tim', 'sistem', 'status'];
}
