<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Masyarakat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'masyarakats';
    protected $primaryKey   = "nik";
    // protected $keyType = 'string';
    // public $incrementing = false;
    protected $fillable     = ['username', 'nik', 'nama', 'telp', 'password'];
}
