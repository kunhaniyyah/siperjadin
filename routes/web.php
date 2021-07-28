<?php


// use Illuminate\Http\Controller\Cru
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;


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


// Auth::routes();
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\Auth\LoginController::class, 'registrasi'])->name('register');
Route::post('/simpanregister', [App\Http\Controllers\Auth\LoginController::class, 'simpanregistrasi'])->name('simpanregister');

//dipake biar kalo mau akses halaman member / halaman dashboard harus login dulu 
Route::group(['middleware' => 'auth'], function(){
    Route::resource('dashboard','App\Http\Controllers\DashboardController');
    //Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::resource('pegawai','App\Http\Controllers\PegawaiController');
    Route::resource('sppd','App\Http\Controllers\SppdController');
    Route::resource('surattugas','App\Http\Controllers\SurattugasController');
    Route::resource('surattgs','App\Http\Controllers\SurattgsController');
    Route::resource('sppdpegawai','App\Http\Controllers\SppdpegawaiController');
    Route::get('/cetakpertanggalsppd/{tglawal}/{tglakhir}', [App\Http\Controllers\SppdController::class, 'cetakpertanggalsppd'])->name('cetakpertanggalsppd');
    Route::get('/cetakpegawai', [App\Http\Controllers\PegawaiController::class, 'cetakpegawai'])->name('cetakpegawai');
    Route::get('/cetakpertanggal/{tglawal}/{tglakhir}', [App\Http\Controllers\SurattugasController::class, 'cetakpertanggal'])->name('cetakpertanggal');
    Route::get('/cetaksurat/{id_st}', [App\Http\Controllers\SurattugasController::class, 'cetaksurat'])->name('cetaksurat');
    Route::get('/status/{id_st}', [App\Http\Controllers\SurattugasController::class, 'status'])->name('status');
    Route::get('/statussppd/{id_sppd}', [App\Http\Controllers\SppdController::class, 'statussppd'])->name('statussppd');
    Route::get('/surattgs', [App\Http\Controllers\SurattgsController::class, 'index'])->name('surattgs');
    Route::post('/surattgs', [App\Http\Controllers\SurattgsController::class, 'update'])->name('surattgs');
    Route::post('/surattgs', [App\Http\Controllers\SurattgsController::class, 'store'])->name('store');

    
});

Route::group(['middleware' => 'CekLevel=pegawai'], function(){

});

//Route::get('/pegawai/detail/{nip}', [App\Http\Controllers\PegawaiController::class, 'detail']);

Route::get('auth/google',[App\Http\Controllers\GoogleController::class,'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[App\Http\Controllers\GoogleController::class,'handleGoogleCallback'])->name('google.callback');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
