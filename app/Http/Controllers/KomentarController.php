<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.komentar.index',['komentars'=>Komentar::latest()->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.komentar.create');
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
            'isi'=>'required',
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        Komentar::create($validatedData);
        return redirect('/komentar')->with('pesan','Komentar berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(Komentar $komentar)
    {
        return view('dashboard.komentar.update',['komentars'=>$komentar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komentar $komentar)
    {
        $validatedData=$request->validate([
            'isi'=>'required',
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        Komentar::where('id',$komentar->id)->update($validatedData);
        return redirect('/komentar')->with('pesan','Komentar berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komentar $komentar)
    {
        Komentar::destroy($komentar->id);
        return redirect('/komentar')->with('pesan','Komentar berhasil dihapus');
    }
}
