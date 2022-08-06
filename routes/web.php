<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;


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

Route::get('/', function () {
    return view('beranda');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logoout');

Route::get('/beranda', [BerandaController::class, 'index']);

Route::group(['middleware' => ['auth', 'cekrole:admin']], function() {
    Route::get('/beranda-admin', [BerandaController::class, 'berandaadmin'])->name('beranda-admin');
});

Route::group(['middleware' => ['auth', 'cekrole:user']], function() {
    Route::get('/beranda-user', [BerandaController::class, 'berandauser'])->name('beranda-user');
});