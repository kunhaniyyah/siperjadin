<?php

namespace App\Http\Controllers;

use App\DataTables\PegawaiDataTable;
use App\Exports\PegawaiExport;
use App\Models\Pegawai;
use App\Models\Jabfung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         
     }

    public function index(Request $request)
    {
        $datapegawai = Pegawai::with('jabfung')->paginate(10);
        $jab = Jabfung::all();
        //$datapegawai = Pegawai::with('pegawai')->pagination(5);
        return view('pegawai.pegawai', compact('datapegawai','jab'));
    }

    public function cetakpegawai()
    {
        $datapegawai = Pegawai::with('jabfung')->paginate(5);
        $jab = Jabfung::all();
        return view('pegawai.cetakpegawai', compact('datapegawai','jab'));
    }


    public function create()
    {
        $jab = Jabfung::all();
        return view('pegawai.tambahpegawai', compact('jab'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, 
        [
            'nip'       =>'required|max:18',
            'nama'      =>'required',
            'fakultas'  =>'required|in:FMIPA,FP,FIB,FEB,FK,FKIP,FH,FSRD,FKOR,Sekolah Vokasi,PDD Madiun,UPT Kearsipan,UNS Pusat',
            'pangkat'   =>'required',
            'golongan'  =>'required',
            'jabfung_id' =>'required',
            'tingkat'   =>'required'
        ]);
       
        Pegawai::create([
            'nip'       =>$request->nip,
            'nama'      =>$request->nama,
            'fakultas'  =>$request->fakultas,
            'pangkat'   =>$request->pangkat,
            'golongan'  =>$request->golongan,
            'jabfung_id'=>$request->jabfung_id,
            'tingkat'   =>$request->tingkat,
            'jabatan'   =>$request->jabatan,
            'foto'      =>$request->foto,
        ]);
        $nm = $request->foto;
        $namaFile = $nm->getClientOriginalName();
        $nm->move(public_path().'/img', $namaFile);
        return redirect('pegawai')->with('toast_success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai);
        return $pegawai;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pegawai)
    {
        $peg = Pegawai::findorfail($id_pegawai);
        $jab = Jabfung::all();
        return view('pegawai.editpegawai', compact('peg','jab'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pegawai)
    {
        $peg = Pegawai::findorfail($id_pegawai);
        //$jab = Jabfung::all();
        $peg->update($request->all());
        return redirect('pegawai')->with('status', 'Data berhasil diupdate');
    }

    public function destroy($id_pegawai)
        {
            Pegawai::destroy($id_pegawai);
            return back()->with('success', 'Data berhasil dihapus!');
            //return"hai";
        }
    public function pegawaiexport()
    {
        return Excel::download(new PegawaiExport , 'pegawai.xlsx');

    }

}
        