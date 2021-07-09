<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapegawai = pegawai::all();
        return view('Pegawai.data-pegawai', compact('datapegawai'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pegawai.input-pegawai');
        
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
        pegawai::create([
            'nip'       => $request->nip,
            'nama'      => $request->nama,
            'fakultas'  => $request->fakultas,
            'pangkat'   => $request->pangkat,
            'golongan'  => $request->golongan,
            'jabfung'   => $request->jabfung,
            'jabstruk'  => $request->jabstruk,
            'jabatan'   => $request->jabatan,
        ]);
        return redirect('data-pegawai');
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

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $item)
    {
        Pegawai::where('id', $item->id)
                -> update([
                    'nip'       => $request->nip,
                    'nama'      => $request->nama,
                    'fakultas'  => $request->fakultas,
                    'golongan'  => $request->golongan,
                    'pangkat'   => $request->pangkat,
                    'jabfung'   => $request->jabfung,
                    'jabstruk'  => $request->jabstruk,
                    'jabatan'   => $request->jabatan,

        ]);
        return view('edit-pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $item, $id)
    {
      Pegawai::destroy($id);
        return redirect()->route('data-pegawai.index');
    }
}
