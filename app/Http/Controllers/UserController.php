<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = User::paginate(10);
        return view('user.user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        // $request->validate([
        //     'name'              => 'required',
        //     'username'          => 'required',
        //     'email'             => 'required',
        //     'nip'               => 'required',
        //     'level_user'        => 'required',
        // ]);

        // //insert ke tabel user
        // User::create([
        //     'nama'          =>$request->name,
        //     'nip'           =>$request->nip,
        //     'username'      =>$request->username,
        //     'level_user'    =>$request->level_user,
        // ]);

        // return redirect('user')->with('success', 'Data Pengguna Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        $user->update($request->all());
        return redirect('user')->with('status', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
        public function destroy(User $user)
        {
            User::destroy($user->id);
            return redirect('/user')->with('success', 'Data Pengguna Berhasil Dihapus!');
        }

    public function statususer($id){
        $user = User::where('id', $id)->first();
        $status_sekarang= $user->status;
        if($status_sekarang == 1)
        {
            User::where('id',$id)->update([
                    'status'=>0
                ]); 
        }else{
            User::where('id',$id)->update([
                'status'=>1
            ]); 
        }
        return back()->with('success', 'Status berhasil diubah!');
    }
}
