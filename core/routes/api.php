<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'API\LoginController@authenticate');
Route::post('/register', 'API\LoginController@register');

Route::get('/masyarakat/{id}', 'API\MasyarakatController@index');
Route::get('/masyarakat/{id}/pengaduan', 'API\MasyarakatController@getPengaduanUser');
Route::get('/masyarakat/pengaduan/{id}', 'API\MasyarakatController@getPengaduanbyID');
Route::post('/masyarakat/pengaduan', 'API\MasyarakatController@addPengaduan');
