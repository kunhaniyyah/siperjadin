<?php


// use Illuminate\Http\Controller\Cru
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

// Route::view('/dashboard', 'dashboard');
//Route::view('/', 'page.auth.login');//biar yang ditampilin pertama itu halaman login


//Auth::routes();
Route::get( '/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post( '/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post( '/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//dipake biar kalo mau akses halaman member / halaman dashboard harus login dulu 
Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);
    
    
});

 Route::resource('data-pegawai', PegawaiController::class);
Route::get('/data-pegawai', [App\Http\Controllers\Pegawai\PegawaiController::class, 'index'])->name('data-pegawai');
Route::get('/index', [App\Http\Controllers\Pegawai\PegawaiController::class, 'update'])->name('update-pegawai');
Route::delete('/data-pegawai/{item}', [App\Http\Controllers\Pegawai\PegawaiController::class, 'destroy']);
Route::get('/input-pegawai', [App\Http\Controllers\Pegawai\PegawaiController::class, 'create'])->name('input-pegawai');
Route::post('/simpan-pegawai', [App\Http\Controllers\Pegawai\PegawaiController::class, 'store'])->name('simpan-pegawai');
Route::get('auth/google',[App\Http\Controllers\GoogleController::class,'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[App\Http\Controllers\GoogleController::class,'handleGoogleCallback'])->name('google.callback');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//showLoginForm ada di function di file LoginController
// Route::get('/', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm']);
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index']);
