<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // protected function credentials(Request $request)
    // {
    //     $credentials = $request->only($this->username(), 'password');
    //     return array_add($credentials, 'status',0);
    // }
    public function showLoginForm()
    {
        return view('page.auth.login');
    }
    protected function sendFailedLoginResponse()
    {
        throw ValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);
    }
    public function username()
    {
        $login = request()->input('username');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL)? 'email' : 'username';
        request()->merge([$field => $login]);
        return $field;
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
            'status'            =>'1',
            'password'          =>bcrypt($request->password),
            'remember_token'    => Str::random(60),
        ]);
        return redirect('/');
    }
}