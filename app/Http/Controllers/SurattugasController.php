<?php

namespace App\Http\Controllers;

use App\Models\Surattugas;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Exports\SurattugasExport;
use App\Models\Anggota;
use App\Models\Pegawai_surattugas;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;

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
        $pegawai_surattugas = Pegawai_surattugas::all();

        $data = Pegawai::with('surattugas')
        ->leftjoin('surattugas', 'surattugas.id', '=', 'pegawai.surattugas_id')
        ->select('pegawai.id AS id', 'surattugas.keperluan','surattugas.tempat',
        'surattugas.tanggal','surattugas.status','surattugas.tanggal_st','surattugas.no_st',
        'pegawai.nip', 'pegawai.nama', 'pegawai.jabatan')
        ->get();
        //return($data);
        // $data = Surattugas::with('pegawai')
        // ->leftjoin('pegawai', 'pegawai.id','=','surattugas.pegawai_id')
        // ->select('pegawai.nama','surattugas.keperluan','surattugas.tempat',
        // 'surattugas.tanggal','surattugas.status','surattugas.tanggal_st','surattugas.no_st')
        // ->get();
        // dd($data);exit();
        // $st = Surattugas::select('*')
        // ->where('pegawai', 'pegawai.id', '=', 'pegawai_surattugas.pegawai_id')
        // ->where('surattugas', 'surattugas.id', '=', 'pegawai_surattugas.surattugas_id');
        //dd($st);
        return view('surattugas.surattugas', compact('datast','user','pegawai','pegawai_surattugas','data'));
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
            'no_st'                     =>$request->no_st,
            'keperluan'                 =>$request->keperluan,
            'tanggal'                   =>$request->tanggal,
            'tempat'                    =>$request->tempat,
            'tanggal_st'                =>$tgl,
            'user_id'                   =>$request->user_id,
        ]);
        if ($request->has('surattugas_id')) {
            $surat_tugas = collect($request->surattugas_id)
                ->map(function ($surat_tugas) {
                    return $surat_tugas;
                })->toArray();

        }
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
    public function edit($id)
    {
        //$surat = Surattugas::findorfail($nip);
        $st = Surattugas::findorfail($id);
        return view('surattugas.editst', compact('st'));
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
        $st = Surattugas::findorfail($id);
        $st->update($request->all());
        return redirect('surattugas')->with('status', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $st = Surattugas::findorfail($id);
        $st->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function cetakpertanggal($tglawal, $tglakhir){
        $datast = Surattugas::whereBetween('tanggal', [$tglawal, $tglakhir])->get();
        return view('surattugas.cetakst',compact('datast'));
    }
    public function status($id){
        $datast = Surattugas::where('id_surattugas', $id)->first();
        $status_sekarang= $datast->status;
        if($status_sekarang == 1)
        {
            Surattugas::where('id_surattugas',$id)->update([
                    'status'=>0
                ]); 
        }else{
            Surattugas::where('id_surattugas',$id)->update([
                'status'=>1
            ]); 
        }
        return back()->with('success', 'Status berhasil diubah!');
    }
    public function cetaksurat($id)
    {
        $datast = Surattugas::where('id_surattugas', $id)->get();
        return view('surattugas.cetaksurat', compact('datast'));
    }
    public function surattugasexport()
    {
        return Excel::download(new SurattugasExport , 'surattugas.xlsx');

    }
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y');
    }
}
