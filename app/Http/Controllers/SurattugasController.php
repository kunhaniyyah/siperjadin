<?php

namespace App\Http\Controllers;

use App\Models\Surattugas;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Exports\SurattugasExport;
use Maatwebsite\Excel\Facades\Excel;

class SurattugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datast = Surattugas::paginate(10);
        $user = User::all();
        $pegawai = Pegawai::all();
        return view('surattugas.surattugas', compact('datast','user','pegawai'));
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
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date('Y-m-d');
        Surattugas::create([
            'no_st'         =>$request->no_st,
            'keperluan'     =>$request->keperluan,
            'tanggal'       =>$request->tanggal,
            'tempat'        =>$request->tempat,
            'tanggal_st'    =>$tgl,
            'pegawai_id_pegawai'    =>$request->pegawai_id_pegawai,
            'user_id'       =>$request->user_id,
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
    public function edit($id_surattugas)
    {
        //$surat = Surattugas::findorfail($nip);
        $st = Surattugas::findorfail($id_surattugas);
        return view('surattugas.editst', compact('st'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_surattugas)
    {
        $st = Surattugas::findorfail($id_surattugas);
        $st->update($request->all());
        return redirect('surattugas')->with('status', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_surattugas)
    {
        $st = Surattugas::findorfail($id_surattugas);
        $st->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function cetakpertanggal($tglawal, $tglakhir){
        $datast = Surattugas::whereBetween('tanggal', [$tglawal, $tglakhir])->get();
        return view('surattugas.cetakst',compact('datast'));
    }
    public function status($id_surattugas){
        $datast = Surattugas::where('id_surattugas', $id_surattugas)->first();
        $status_sekarang= $datast->status;
        if($status_sekarang == 1)
        {
            Surattugas::where('id_surattugas',$id_surattugas)->update([
                    'status'=>0
                ]); 
        }else{
            Surattugas::where('id_surattugas',$id_surattugas)->update([
                'status'=>1
            ]); 
        }
        return back()->with('success', 'Status berhasil diubah!');
    }
    public function cetaksurat($id_surattugas)
    {
        $datast = Surattugas::where('id_surattugas', $id_surattugas)->get();
        return view('surattugas.cetaksurat', compact('datast'));
    }
    public function surattugasexport()
    {
        return Excel::download(new SurattugasExport , 'surattugas.xlsx');

    }
}
