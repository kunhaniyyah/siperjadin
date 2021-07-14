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

// Route::view('/dashboard', 'dashboard');
//Route::view('/', 'page.auth.login');//biar yang ditampilin pertama itu halaman login


//Auth::routes();
Route::get( '/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post( '/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post( '/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get( '/register', [App\Http\Controllers\Auth\LoginController::class, 'registrasi'])->name('register');
Route::post( '/simpanregister', [App\Http\Controllers\Auth\LoginController::class, 'simpanregistrasi'])->name('simpanregister');

Route::view('/', 'page.auth.login');
//dipake biar kalo mau akses halaman member / halaman dashboard harus login dulu 
Route::group(['middleware' => 'auth','ceklevel:admin,staff'], function(){
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::resource('pegawai','App\Http\Controllers\PegawaiController');
    Route::resource('sppd','App\Http\Controllers\SppdController');
    Route::resource('surattugas','App\Http\Controllers\SurattugasController');
    
    // Route::get('/surattugas', [App\Http\Controllers\SurattugasController::class, 'index'])->name('surattugas');
    // Route::get('/tambahst', [App\Http\Controllers\SurattugasController::class, 'create'])->name('tambahst');
    // Route::post('/simpanst', [App\Http\Controllers\SurattugasController::class, 'store'])->name('simpanst');
    // Route::get('/deletest/{id_st}', [App\Http\Controllers\SurattugasController::class, 'destroy'])->name('deletest');
    Route::get('/cetakpertanggalsppd/{tglawal}/{tglakhir}', [App\Http\Controllers\SppdController::class, 'cetakpertanggalsppd'])->name('cetakpertanggalsppd');
    Route::get('/cetakpegawai', [App\Http\Controllers\PegawaiController::class, 'cetakpegawai'])->name('cetakpegawai');
    Route::get('/cetakpertanggal/{tglawal}/{tglakhir}', [App\Http\Controllers\SurattugasController::class, 'cetakpertanggal'])->name('cetakpertanggal');
    // Route::post('/updatest/{id_st}', [App\Http\Controllers\SurattugasController::class, 'update'])->name('updatest');
    
    //pengajuan
    Route::get('/surattgs', [App\Http\Controllers\SurattgsController::class, 'index'])->name('surattgs');

    
});


//Route::get('/pegawai/detail/{nip}', [App\Http\Controllers\PegawaiController::class, 'detail']);

Route::get('auth/google',[App\Http\Controllers\GoogleController::class,'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[App\Http\Controllers\GoogleController::class,'handleGoogleCallback'])->name('google.callback');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  

//showLoginForm ada di function di file LoginController
// Route::get('/', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm']);
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


