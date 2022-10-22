<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.karyawan.index',['karyawans'=>Karyawan::latest()->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.karyawan.create',['jabatans'=>Jabatan::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'nama'=>'required',
            'jabatan_id'=>'required',
            'deskripsi'=>'required',
            'foto'=>'image|mimes:jpeg,svg,png,jpg|max:4096'
        ]);
        if(!empty($request->foto)){
            $foto = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('img/staff'),$foto);
            $validatedData['foto'] = $foto;
        }else{
            $validatedData['foto'] = null;
        }
        Karyawan::create($validatedData);
        return redirect('/karyawan')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('dashboard.karyawan.update',['karyawans'=>$karyawan, 'jabatans'=>Jabatan::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validatedData=$request->validate([
            'nama'=>'required',
            'jabatan_id'=>'required',
            'deskripsi'=>'required',
            'foto'=>'image|mimes:jpeg,svg,png,jpg|max:4096'
        ]);
        if(!empty($request->foto)){
            $foto = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('img/staff'),$foto);
            $validatedData['foto'] = $foto;
        }else{
            $validatedData['foto'] = null;
        }
        Karyawan::where('id',$karyawan->id)->update($validatedData);
        return redirect('/karyawan')->with('pesan','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        Karyawan::destroy($karyawan->id);
        return redirect('/karyawan')->with('pesan','Data berhasil dihapus');
    }
}
