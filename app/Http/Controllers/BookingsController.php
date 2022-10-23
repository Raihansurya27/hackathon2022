<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
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
            'tanggal_booking'=>'required',
            'notelp'=>'required',
            'jumlah'=>'required',
        ]);
        $validatedData['deskripsi'] = $request->deskripsi;
        $validatedData['user_id'] = Auth::user()->id;
        Booking::create($validatedData);
        return redirect('/#book-a-table')->with('booking','Berhasil dibooking');
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
        return view('booking.update',['bookings'=>Booking::find($id)]);
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
            'tanggal_booking'=>'required',
            'notelp'=>'required',
            'jumlah'=>'required',
        ]);
        $validatedData['deskripsi'] = $request->deskripsi;
        $validatedData['user_id'] = Auth::user()->id;
        Booking::where('id',$id)->update($validatedData);
        return redirect('/#book-a-table')->with('booking','Booking berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::destroy($id);
        return redirect('/home')->with('booking','Booking berhasil dihapus');
    }
}
