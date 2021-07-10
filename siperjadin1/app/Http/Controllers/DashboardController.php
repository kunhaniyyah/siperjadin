<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class DashboardController extends Controller
{


    public function index()
    {
        return view ('dashboard')->with('success', 'Login Berhasil!');
    }
    public function dashboardstaff()
    {
            return view ('dashboardstaff');
    }
     public function pegawai2(){
         return "hai user";
     }
}
