<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sppd;
use App\Models\Surattugas;
use App\Exports\SppdExport;
use App\Models\Pegawai;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;

class SppdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$goals = $pegawai->goals()->get();
        $sppd = Sppd::with('surattugas.pegawai')->get();
        $surattugas = Surattugas::all();
        $pegawai = Pegawai::all();

        // header('Content-Type: application/json');
        // echo json_encode($sppd);

        return view('sppd.sppd', compact('sppd','surattugas','pegawai'));
    }
    public function cetakpertanggalsppd($tglawal, $tglakhir){
        $sppd = Sppd::whereBetween('created_at', [$tglawal, $tglakhir])->get();
        return view('sppd.cetaksppd',compact('sppd'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sppd.tambahsppd');
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
        // $this->validate($request,
        // [
        //     'surattugas_id_surattugas'  => 'required',
        //     'id_sppd'       => 'required',
        //     'no_sppd'       => 'required',
        //     'tgl_berangkat' => 'required',
        //     'tgl_pulang'    => 'required',
        //     'provinsi'      => 'required',
        //     'kota'          => 'required',
        //     'tanggal_sppd'  => 'required',
        // ]);
        Sppd::create([
            'surattugas_id_surattugas'  =>$request->surattugas_id_surattugas,
            'no_sppd'                   =>$request->no_sppd,
            'tgl_berangkat'             =>$request->tgl_berangkat,
            'tgl_pulang'                =>$request->tgl_pulang,
            'provinsi'                  =>$request->provinsi,
            'kota'                      =>$request->kota,
            'tanggal_sppd'              =>$request->tanggal_sppd,
        ]);
        return redirect('sppd')->with('toast_success', 'Data Berhasil Ditambahkan');
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
    public function edit($id_sppd)
    {
        $dinas = Sppd::findorfail($id_sppd);
        return view ('sppd.editsppd', compact('dinas'))->with('toast_success', 'Data Berhasil Ditambah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sppd)
    {
        $dinas = Sppd::findorfail($id_sppd);
        $dinas->update($request->all());
        return redirect('sppd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sppd)
    {
        Sppd::destroy($id_sppd);
        return back()->with('success', 'Data Berhasil Dihapus');
    }
    public function statussppd($id_sppd){
        $sppd = Sppd::where('id_sppd', $id_sppd)->first();
        $status_sekarang= $sppd->status;
        if($status_sekarang == 1)
        {
            Sppd::where('id_sppd',$id_sppd)->update([
                    'status'=>0
                ]); 
        }else{
            Sppd::where('id_sppd',$id_sppd)->update([
                'status'=>1
            ]); 
        }
        return back()->with('success', 'Status berhasil diubah!');
    }
    public function cetaksppd($id_sppd)
    {
        $sppd = Sppd::where('id_sppd', $id_sppd)->get();
        return view('sppd.cetakfilesppd', compact('sppd'));
    }
    public function sppdexport()
    {
        return Excel::download(new SppdExport , 'sppd.xlsx');

    }
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y');
        return Carbon::now()->settings(
            [
                'locale'    => 'id_ID',
                'timezone'  => 'Asia/Jakarta'
            ]
            );
        // return \Carbon\Carbon::parse($this->attributes['created_at'])
        // ->diffForHumans();
        // $mytime = Carbon::now();
        // echo $mytime->toDateTimeString();
        
    }
}
