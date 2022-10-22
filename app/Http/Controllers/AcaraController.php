<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.acara.index',['acaras'=>Acara::latest()->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.acara.create');
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
            'nama'=>'required|unique:acaras',
            'harga'=>'required',
            'deskripsi'=>'required',
            'gambar'=>'image|mimes:jpeg,svg,png,jpg|max:4096'
        ]);
        if(!empty($request->gambar)){
            $foto = $request->nama.'.'.$request->gambar->extension();
            $request->gambar->move(public_path('img/event'),$foto);
            $validatedData['gambar'] = $foto;
        }
        Acara::create($validatedData);
        return redirect('/acara')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function show(Acara $acara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function edit(Acara $acara)
    {
        return view('dashboard.acara.update',['acaras'=>$acara]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acara $acara)
    {
        $validatedData=$request->validate([
            'nama'=>'required|',
            'harga'=>'required',
            'deskripsi'=>'required',
            'gambar'=>'image|mimes:jpeg,svg,png,jpg|max:4096'
        ]);
        if(!empty($request->gambar)){
            $foto = $request->nama.'.'.$request->gambar->extension();
            $request->gambar->move(public_path('img/event'),$foto);
            $validatedData['gambar'] = $foto;
        }else{
            $validatedData['gambar'] = null;
        }
        Acara::where('id',$acara->id)->update($validatedData);
        return redirect('/acara')->with('pesan','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acara $acara)
    {
        Acara::destroy($acara->id);
        return redirect('/acara')->with('pesan','Data berhasil dihapus');
    }
}
