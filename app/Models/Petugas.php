<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Petugas extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'petugass';
    protected $primaryKey  = 'id_petugas';
    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level',
    ];
}
