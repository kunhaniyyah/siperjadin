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
        $data = Surattugas::all();
        return view ('surattugas.tambahst', compact('data'));
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

    public function cetakpertanggal($tglawal, $tglakhir){
        $datast = Surattugas::whereBetween('tanggal', [$tglawal, $tglakhir])->get();
        return view('surattugas.cetakst',compact('datast'));
    }
    public function status($id_st){
        $datast = Surattugas::where('id_st', $id_st)->first();
        $status_sekarang= $datast->status;
        if($status_sekarang == 1)
        {
            Surattugas::where('id_st',$id_st)->update([
                    'status'=>0
                ]); 
        }else{
            Surattugas::where('id_st',$id_st)->update([
                'status'=>1
            ]); 
        }
        return back()->with('success', 'Data berhasil diubah!');
    }
    public function cetaksurat($id_st)
    {
        $datast = Surattugas::where('id_st', $id_st)->get();
        return view('surattugas.cetaksurat', compact('datast'));
    }
}
