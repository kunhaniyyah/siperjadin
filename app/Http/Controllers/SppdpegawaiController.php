<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sppd;
use App\Models\Surattugas;

class SppdpegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sppd::where('nip', Auth::user()->nip)->get();
        $surattugas = Surattugas::all();
        // $datast = Surattugas::where('no_st', Auth::surattugas()->no_st)->get();
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date('Y-m-d');
        $cek = Sppd::where('tanggal_sppd', $tgl) -> first();
        return view('pengajuan.sppdpegawai', compact('data','cek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datast = Sppd::all();
        $data = Sppd::where('nip', Auth::user())->first();
        $sppd = Sppd::where('id');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date('Y-m-d');
        Sppd::create([
            'no_sppd'       =>$request->no_sppd,
            'no_st'         =>$request->no_st,
            'nama'          =>Auth::user()->name,
            'nip'           =>Auth::user()->nip,
            'tingkat'       =>$request->tingkat,
            'tgl_berangkat' =>$request->tgl_berangkat,
            'tgl_pulang'    =>$request->tgl_pulang,
            'kegiatan'      =>$request->kegiatan,
            'provinsi'      =>$request->provinsi,
            'kota'          =>$request->kota,
            'tanggal_sppd'  =>$tgl,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id_sppd)
    {
        Surattugas::destroy($id_sppd);
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
