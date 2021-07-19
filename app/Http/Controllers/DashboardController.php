<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
// use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // return $request;
        return view ('dashboard')->with('success', 'Login Berhasil!');
    }

    // public function tampilkanSession(Request $request) {
	// 	if($request->session()->has('nama')){
	// 		echo $request->session()->get('nama');
	// 	}else{
	// 		echo 'Tidak ada data dalam session.';
	// 	}
	// }
    public function dashboardstaff()
    {
            return view ('dashboardstaff');
    }
     public function pegawai2(){
         return "hai user";
     }
}
