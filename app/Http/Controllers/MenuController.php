<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Tipe;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.menu.index',['menus'=>Menu::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.menu.create',['tipes'=>Tipe::all()]);
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
            'nama'=>'required|unique:menus|',
            'harga'=>'required',
            'tipemenu_id'=>'required',
            'deskripsi'=>'required',
            'gambar'=>'image|mimes:jpeg,svg,png,jpg|max:4096'
        ]);
        if(!empty($request->gambar)){
            $foto = $request->nama.'.'.$request->gambar->extension();
            $request->gambar->move(public_path('img/menu'),$foto);
            $validatedData['gambar'] = $foto;
        }
        Menu::create($validatedData);
        return redirect('/menu')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('dashboard.menu.update',['menus' => $menu,'tipes'=>Tipe::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validatedData=$request->validate([
            'nama'=>'required|',
            'harga'=>'required',
            'tipemenu_id'=>'required',
            'deskripsi'=>'required',
            'gambar'=>'image|mimes:jpeg,svg,png,jpg|max:4096'
        ]);
        if(!empty($request->gambar)){
            $foto = $request->nama.'.'.$request->gambar->extension();
            $request->gambar->move(public_path('img/menu'),$foto);
            $validatedData['gambar'] = $foto;
        }else{
            $validatedData['gambar'] = null;
        }
        Menu::where('id',$menu->id)->update($validatedData);
        return redirect('/menu')->with('pesan','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);
        return redirect('/menu')->with('pesan','Data berhasil dihapus');
    }
}
