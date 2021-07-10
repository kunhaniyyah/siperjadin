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
    Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai');
    Route::get('/tambahpegawai', [App\Http\Controllers\PegawaiController::class, 'create'])->name('tambahpegawai');
    Route::post('/simpanpegawai', [App\Http\Controllers\PegawaiController::class, 'store'])->name('simpanpegawai');
    Route::get('/editpegawai/{nip}', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('editpegawai');
    Route::post('/updatepegawai/{nip}', [App\Http\Controllers\PegawaiController::class, 'update'])->name('updatepegawai');
    Route::get('/deletepegawai/{nip}', [App\Http\Controllers\PegawaiController::class, 'destroy'])->name('deletepegawai');
    
    Route::get('/surattugas', [App\Http\Controllers\SurattugasController::class, 'index'])->name('surattugas');
    Route::get('/tambahst', [App\Http\Controllers\SurattugasController::class, 'create'])->name('tambahst');
    Route::post('/simpanst', [App\Http\Controllers\SurattugasController::class, 'store'])->name('simpanst');
    Route::get('/deletest/{no_st}', [App\Http\Controllers\SurattugasController::class, 'destroy'])->name('deletest');
    Route::get('/editst/{no_st}', [App\Http\Controllers\SurattugasController::class, 'edit'])->name('editst');
    Route::post('/updatest/{no_st}', [App\Http\Controllers\SurattugasController::class, 'update'])->name('updatest');
    
    Route::get('/sppd', [App\Http\Controllers\SppdController::class, 'index'])->name('sppd');
    Route::get('/tambahsppd', [App\Http\Controllers\SppdController::class, 'create'])->name('tambahsppd');
    Route::post('/simpanppd', [App\Http\Controllers\SppdController::class, 'store'])->name('simpansppd');
    Route::get('/deletesppd/{no_sppd}', [App\Http\Controllers\SppdController::class, 'destroy'])->name('deletesppd');
    Route::get('/editsppd/{no_sppd}', [App\Http\Controllers\SppdController::class, 'edit'])->name('editsppd');
    Route::post('/updatesppd/{no_sppd}', [App\Http\Controllers\SppdController::class, 'update'])->name('updatesppd');
    
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


