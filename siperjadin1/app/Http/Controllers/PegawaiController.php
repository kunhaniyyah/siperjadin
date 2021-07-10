<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
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
      
        $datapegawai = Pegawai::paginate(5);
        //$datapegawai = Pegawai::with('pegawai')->pagination(5);
        return view('pegawai.pegawai', compact('datapegawai'));
    }

    public function create()
    {
        
        return view('pegawai.tambahpegawai');
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
            'fakultas'  =>'required|in:FMIPA,FP,FIB,FEB',
            'pangkat'   =>'required',
            'golongan'  =>'required',
            'jabfung'   =>'required',
            'tingkat'   =>'required'
        ]);
        Pegawai::create([
            'nip'       =>$request->nip,
            'nama'      =>$request->nama,
            'fakultas'  =>$request->fakultas,
            'pangkat'   =>$request->pangkat,
            'golongan'  =>$request->golongan,
            'jabfung'   =>$request->jabfung,
            'tingkat'   =>$request->tingkat,
        ]);
        return redirect('pegawai')->with('toast_success', 'Data berhasil ditambahkan!');;
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
    public function edit($nip)
    {
        $peg = Pegawai::findorfail($nip);
        return view('pegawai.editpegawai', compact('peg'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nip)
    {
        $peg = Pegawai::findorfail($nip);
        $peg->update($request->all());
        return redirect('pegawai')->with('status', 'Data berhasil diupdate');
    }

    public function destroy($nip)
        {
            $datapegawai = Pegawai::findorfail($nip);
            $datapegawai->delete();
            return back()->with('success', 'Data berhasil dihapus!');
        }
    public function export_excel()
        {
            //return Excel::download(new Pegawai, 'pegawai.xlsx');
        }
}
        