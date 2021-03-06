<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Surattugas;
use App\Models\User;
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
        $data = Surattugas::whereHas('pegawai', function($query){
            $query->where('nip', '=', Auth::user()->nip);
        })->get();
        $user = User::where('nip', Auth::user()->nip)->get();
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date('Y-m-d');
        $cek = Surattugas::where('tanggal_st', $tgl) -> first();

        return view('pengajuan.surattgs', compact('data', 'user', 'cek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datast = Surattugas::all();
        
        $data = Surattugas::where('nip',Auth::user())->first();
        $surattgs = Surattugas::where('pegawai_id_pegawai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date('Y-m-d');
        Surattugas::create([
            'nip'           =>Auth::user()->nip,
            'nama'          =>Auth::user()->name,
            'keperluan'     =>$request->keperluan,
            'tanggal'       =>$request->tanggal,
            'tempat'        =>$request->tempat,
            'tanggal_st'    =>$tgl,
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
    public function update(Request $request, $id_st)
    {
        $surat = Surattugas::findorfail($id_st);
        $surattgs = [
            'nip'           =>  $request->get(Auth::user()->nip),
            'nama'          => Auth::user()->nama,
            'keperluan'     => $request->get('keperluan'),
            'tanggal'       => $request->get('tanggal'),
            'tempat'        => $request->get('tempat'),
        ];
        $surat->update(

        );
        return redirect('surattugas')->with('status', 'Data berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_st)
    {
        $st = Surattugas::findorfail($id_st);
        $st->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
    public function cetaksurat($id_st)
    {
        $datast = Surattugas::where('id_st', $id_st)->get();
        return view('pengajuan.cetaksurat', compact('datast'));
    }
}
