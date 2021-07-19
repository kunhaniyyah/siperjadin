<?php

namespace App\Http\Controllers;

use App\Models\Surattugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SurattgsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Surattugas::where('nip', Auth::user()->nip);
        return view('pengajuan.surattgs', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view ('surattugas.tambahst');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Surattugas::create([
            'no_st'         =>$request->no_st,
            'user_nip'      =>$request->user_nip,
            'nama'          =>$request->nama,
            'keperluan'     =>$request->keperluan,
            'tanggal'       =>$request->tanggal,
            'tempat'        =>$request->tempat,
        ]);
        return redirect('surattgs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        return view ('surattugas.editst');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
