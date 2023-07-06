<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\TanggapanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Edit Controller Disini
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::Post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['middleware' => ['auth:petugass']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::middleware(['admin'])->group(function () {
        Route::prefix('admin/petugas')->group(function () {
            Route::get('/', [PetugasController::class, 'index']);
            Route::post('/', [PetugasController::class, 'store']);
            Route::put('{id}', [PetugasController::class, 'update']);
            Route::delete('{id}', [PetugasController::class, 'delete']);
        });
        Route::prefix('admin/masyarakat')->group(function () {
            Route::get('/', [MasyarakatController::class, 'index']);
            Route::post('{id}', [MasyarakatController::class, 'store']);
            Route::put('{id}', [MasyarakatController::class, 'update']);
            Route::delete('{id}', [MasyarakatController::class, 'delete']);
        });
    });

    Route::prefix('/pengaduan')->group(function () {
        Route::get('/baru', [PengaduanController::class, 'getPengaduanBaru']);
        Route::post('/verifikasi/{id}', [PengaduanController::class, 'verifikasiPengaduan']);
        Route::post('/tanggapan/{id}', [TanggapanController::class, 'postTanggapan']);
        Route::get('/terverifikasi', [PengaduanController::class, 'getPengaduanVerifikasi']);
        Route::get('/selesai', [PengaduanController::class, 'getPengaduanSelesai']);
    });
});

Route::group(['middleware' => ['auth:masyarakats']], function () {
    Route::get('/home/masyarakat', function () {
        return view('pages/masyarakat-home');
    })->name('masyarakat.home');
    Route::get('/home/masyarakat/pengaduansaya', 'Masyarakat\PengaduanController@getPengaduan')->name('masyarakat.pengaduan.saya');
    Route::post('/home/masyarakat/pengaduan', 'Masyarakat\PengaduanController@store');
});

Route::get('/', function () {
    return redirect('home');
});
