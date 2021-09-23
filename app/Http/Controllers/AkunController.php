<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;


class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = User::where('nip', Auth::user()->nip,)->get();
        return view('user.akun', compact('user'));
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
        //
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
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('akun', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $data = [
            "name"              => $request->name,
            "username"          => $request->username,
            "email"             => $request->email,
            "nip"               => $request->nip,
            "level_user"        => Auth::user()->level_user,
            "status"            => Auth::user()->status,
            
        ];

        if($request->name != Auth::user()->name || $request->exp_reminder != Auth::user()->exp_reminder){
            $update = DB::table('users')->where("id", Auth::user()->id)->update($data);

            if($update){
                $request->session()->flash("success", "Profile berhasil diperbarui.");
            } else {
                $request->session()->flash("error", "Profile gagal diperbarui!");
            }
        } else {
            $request->session()->flash("error", "Tidak ada perubahan!");
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $nip)
    {
        User::destroy($nip);
            return back()->with('success', 'Data berhasil dihapus!');
    }
    // public function update_avatar(Request $request){

    //     $request->validate([
    //         'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $user = Auth::user();

    //     $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

    //     $request->avatar->storeAs('avatars',$avatarName);

    //     $user->avatar = $avatarName;
    //     $user->save();

    //     return back()
    //         ->with('success','You have successfully upload image.');

    // }
}
