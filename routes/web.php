<?php


// use Illuminate\Http\Controller\Cru
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Carbon;


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
Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
//Route::get('/register', [App\Http\Controllers\Auth\LoginController::class, 'registrasi'])->name('register');
// Route::post('/simpanregister', [App\Http\Controllers\Auth\LoginController::class, 'simpanregistrasi'])->name('simpanregister');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify'=> true]);

//dipake biar kalo mau akses halaman member / halaman dashboard harus login dulu 
Route::group(['middleware' => ['ceklevel:admin']], function(){
    Route::resource('dashboard','App\Http\Controllers\DashboardController')->middleware('verified');
    Route::resource('pegawai','App\Http\Controllers\PegawaiController');
    Route::resource('sppd','App\Http\Controllers\SppdController');
    Route::resource('surattugas','App\Http\Controllers\SurattugasController');
    Route::resource('user','App\Http\Controllers\UserController');
    Route::get('/statususer/{id}', [App\Http\Controllers\UserController::class, 'statususer'])->name('statususer');
    Route::get('/exportpegawai', [App\Http\Controllers\PegawaiController::class, 'pegawaiexport'])->name('exportpegawai');
    Route::get('/exportst', [App\Http\Controllers\SurattugasController::class, 'surattugasexport'])->name('exportst');
    Route::get('/exportsppd', [App\Http\Controllers\SppdController::class, 'sppdexport'])->name('exportsppd');
    Route::get('/cetakpertanggalsppd/{tglawal}/{tglakhir}', [App\Http\Controllers\SppdController::class, 'cetakpertanggalsppd'])->name('cetakpertanggalsppd');
    Route::get('/cetakpegawai', [App\Http\Controllers\PegawaiController::class, 'cetakpegawai'])->name('cetakpegawai');
    Route::get('/cetakpertanggal/{tglawal}/{tglakhir}', [App\Http\Controllers\SurattugasController::class, 'cetakpertanggal'])->name('cetakpertanggal');
    Route::get('/cetaksurat/{id_st}', [App\Http\Controllers\SurattugasController::class, 'cetaksurat'])->name('cetaksurat');
    Route::get('/status/{id_st}', [App\Http\Controllers\SurattugasController::class, 'status'])->name('status');
    Route::get('/statussppd/{id_sppd}', [App\Http\Controllers\SppdController::class, 'statussppd'])->name('statussppd');
    Route::get('/surattgs', [App\Http\Controllers\SurattgsController::class, 'index'])->name('surattgs');
    Route::post('/surattgs', [App\Http\Controllers\SurattgsController::class, 'update'])->name('surattgs');
    Route::post('/surattgs', [App\Http\Controllers\SurattgsController::class, 'store'])->name('store');
    Route::get('/cetaksppd/{id_sppd}', [App\Http\Controllers\SppdController::class, 'cetaksppd'])->name('cetaksppd');
    Route::post('profile', 'AkunController@update_avatar');
    
});


Route::group(['middleware' => ['auth','ceklevel:staff,admin']], function(){
    Route::get('/cetaksppd/{id_sppd}', [App\Http\Controllers\SppdController::class, 'cetaksppd'])->name('cetaksppd');
    Route::resource('surattgs','App\Http\Controllers\SurattgsController');
    Route::resource('sppdpegawai','App\Http\Controllers\SppdpegawaiController');
    Route::resource('akun','App\Http\Controllers\AkunController');
    Route::post('profile', 'AkunController@update_avatar');
});

Route::group(['middleware' => ['auth','ceklevel:staff,admin']], function(){
    Route::resource('dashboard','App\Http\Controllers\DashboardController')->middleware('verified');
});

//Route::get('/pegawai/detail/{nip}', [App\Http\Controllers\PegawaiController::class, 'detail']);

Route::get('auth/google',[App\Http\Controllers\GoogleController::class,'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[App\Http\Controllers\GoogleController::class,'handleGoogleCallback'])->name('google.callback');
