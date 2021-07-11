<?php

namespace App\Http\Controllers;

use App\Models\Surattugas;
use Illuminate\Http\Request;

class SurattugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datast = Surattugas::paginate(5);
        return view('surattugas.surattugas', compact('datast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ('surattugas.tambahst');
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
        Surattugas::create([
            'id_st'         =>$request->id_st,
            'no_st'         =>$request->no_st,
            'nip'           =>$request->nip,
            'nama'          =>$request->nama,
            'keperluan'     =>$request->keperluan,
            'tanggal'       =>$request->tanggal,
            'tempat'        =>$request->tempat,
        ]);
        return redirect('surattugas');
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
    public function edit($id_st)
    {
        //$surat = Surattugas::findorfail($nip);
        $st = Surattugas::findorfail($id_st);
        return view('surattugas.editst', compact('st'));
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
        $surat->update($request->all());
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
}
