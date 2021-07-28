<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Validator;
use Session;

class LoginController extends Controller
{

    public function showLoginForm()
    {

        return view('page.auth.login');
    }
    public function login(Request $request)
    {
        //dd($request->all());
        $data = User::where('username', $request->username)->firstOrFail();
       if($data){
           if(Hash::check($request->password , $data->password)){
            // dd($request->all());
            session(['berhasil_login' => true]);
            return redirect('dashboard');
           }
       }
       return redirect('/')->with('messages', 'email/pass salah');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
    public function registrasi(){
        return view('page.auth.register');
    }
    public function simpanregistrasi(Request $request){

        //dd($request->all());

        User::create([
            'nip'               =>$request->nip,
            'username'          =>$request->username,
            'level_user'        => 'staff',
            'name'              =>$request->name,
            'email'             =>$request->email,
            'password'          =>bcrypt($request->password),
            'remember_token'    => Str::random(60),
        ]);
        return redirect('login');
    }
}
