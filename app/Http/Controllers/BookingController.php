<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Peran;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.booking.index',['bookings'=>Booking::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.booking.create');
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
            'status'=>'required',
        ]);
        $validatedData['deskripsi'] = $request->deskripsi;
        $validatedData['user_id'] = Auth::user()->id;
        Booking::create($validatedData);
        return redirect('/booking')->with('pesan','Bookingan anda berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('dashboard.booking.update',['bookings'=>$booking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $validatedData=$request->validate([
            'tanggal_booking'=>'required',
            'notelp'=>'required',
            'jumlah'=>'required',
            'status'=>'required',
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        Booking::where('id',$booking->id)->update($validatedData);
        return redirect('/booking')->with('pesan','Bookingan anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        Booking::destroy($booking->id);
        return redirect('/booking')->with('pesan','Bookingan anda berhasil dihapus');
    }
}
