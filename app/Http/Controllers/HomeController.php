<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipe;
use App\Models\Menu;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Acara;
use App\Models\Booking;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        if(Auth::user()){
            return view('home',['tipes'=>Tipe::all(),
            'menus'=>Menu::all(),
            'jabatans'=>Jabatan::all(),
            'karyawans'=>Karyawan::all(),
            'acaras'=>Acara::all(),
            'bookings'=>Booking::where('user_id',Auth::user()->id)->where('status','dibooking')->get(),
            'komentars'=>Komentar::all()]);
        }else{
            return view('home',['tipes'=>Tipe::all(),
            'menus'=>Menu::all(),
            'jabatans'=>Jabatan::all(),
            'karyawans'=>Karyawan::all(),
            'acaras'=>Acara::all(),
            'komentars'=>Komentar::all()]);
        }

    }
}
