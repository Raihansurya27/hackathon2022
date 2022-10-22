<?php

namespace App\Http\Controllers;

use App\Models\Peran;
use Illuminate\Http\Request;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.peran.index',['perans'=>Peran::latest()->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.peran.create');
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
            'nama'=>'required|unique:perans',
        ]);
        Peran::create($validatedData);
        return redirect('/peran')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peran  $peran
     * @return \Illuminate\Http\Response
     */
    public function show(Peran $peran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peran  $peran
     * @return \Illuminate\Http\Response
     */
    public function edit(Peran $peran)
    {
        return view('dashboard.peran.update',['perans'=>$peran]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peran  $peran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peran $peran)
    {
        $validatedData=$request->validate([
            'nama'=>'required|',
        ]);
        Peran::where('id',$peran->id)->update($validatedData);
        return redirect('/peran')->with('pesan','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peran  $peran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peran $peran)
    {
        Peran::destroy($peran->id);
        return redirect('/peran')->with('pesan','Data berhasil dihapus');
    }
}
