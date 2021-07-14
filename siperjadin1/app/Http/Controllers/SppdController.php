<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sppd;

class SppdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sppd = Sppd::paginate(5);
        return view('sppd.sppd', compact('sppd'));
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
        $this->validate($request,
        [
            'no_sppd'       => 'required',
            'no_st'         => 'required',
            'nama'          => 'required',
            'nip'           => 'required',
            'tingkat'       => 'required',
            'tgl_berangkat' => 'required',
            'tgl_pulang'    => 'required',
            'provinsi'      => 'required',
            'kegiatan'      => 'required',
            'kota'          => 'required',
            'total_ajuan'   => 'required',
        ]);
        Sppd::create([
            'id_sppd'       =>$request->id_sppd,
            'no_sppd'       =>$request->no_sppd,
            'no_st'         =>$request->no_st,
            'nama'          =>$request->nama,
            'nip'           =>$request->nip,
            'tingkat'       =>$request->tingkat,
            'tgl_berangkat' =>$request->tgl_berangkat,
            'tgl_pulang'    =>$request->tgl_pulang,
            'kegiatan'      =>$request->kegiatan,
            'provinsi'      =>$request->provinsi,
            'kota'          =>$request->kota,
            'total_ajuan'   =>$request->total_ajuan,
        ]);
        return redirect('sppd')->with('toast_success', 'Data Berhasil Ditambah');
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
        return view ('sppd.editsppd', compact('dinas'));
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
}
