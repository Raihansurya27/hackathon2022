<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Peran;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index',['users'=>User::latest()->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create',['perans'=>Peran::all()]);
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
            'name'=>'required',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:8',
            'peran_id'=>'required',
            'picture'=>'image|mimes:jpeg,svg,png,jpg|max:4096'
        ]);
        if(!empty($request->picture)){
            $foto = $request->name.'.'.$request->picture->extension();
            $request->picture->move(public_path('img/profil'),$foto);
            $validatedData['picture'] = $foto;
        }else{
            $validatedData['picture'] = null;
        }
        $validatedData['email_verified_at'] = now();
        $validatedData['remember_token'] = Str::random(10);
        $validatedData['password'] = Hash::make($request->password);
        User::create($validatedData);
        return redirect('/user')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.update',['users'=>$user, 'perans'=>Peran::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'peran_id'=>'required',
            'picture'=>'image|mimes:jpeg,svg,png,jpg|max:4096'
        ]);
        if(!empty($request->picture)){
            $foto = $request->name.'.'.$request->picture->extension();
            $request->picture->move(public_path('img/profil'),$foto);
            $validatedData['picture'] = $foto;
        }else{
            $validatedData['picture'] = null;
        }
        $validatedData['email_verified_at'] = now();
        $validatedData['remember_token'] = Str::random(10);
        $validatedData['password'] = Hash::make($request->password);
        User::where('id',$id)->update($validatedData);
        return redirect('/user')->with('pesan','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with('pesan','Data berhasil dihapus');
    }
}
