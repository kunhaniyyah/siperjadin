<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => ['required', 'string', 'max:255'],
            'username'          => ['required', 'string', 'max:255'],
            'nip'               => ['required', 'string', 'max:255'],
            'status'            => ['in:1,0'],
            'level_user'        => ['in:admin,staff'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            // 'avatar'            => ['sometimes', 'image', 'mimes:jpg,jpeg,png,svg,bmp', 'max:5000'],
        ]);
    }
    protected function create(array $data )
    {
       
        return User::create([
            'name'              => $data['name'],
            'username'          => $data['username'],
            'nip'               => $data['nip'],
            'email'             => $data['email'],
            'status'            => '1',
            'level_user'        => 'staff',
            'password'          => Hash::make($data['password']),
        ]);

         // if(request()->has('avatar')){
        //     $avataruploaded = request()->file('avatar');
        //     $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
        //     $avatarpath = public_path('/image');
        //     $avataruploaded->move($avatarpath,$avatarname);
        //     return User::create([
        //         'name'              => $data['name'],
        //         'username'          => $data['username'],
        //         'nip'               => $data['nip'],
        //         'email'             => $data['email'],
        //         'status'            => '1',
        //         'level_user'        => 'staff',
        //         'password'          => Hash::make($data['password']),
        //         'avatar'            => '/image/'. $avatarname,
        //     ]);
        // }
    }
}
