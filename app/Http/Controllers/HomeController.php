<?php

namespace App\Http\Controllers;

use App\Models\Kue;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $favorit = Kue::orderBy('total_order')->paginate(3);
        $terbaru = Kue::latest()->paginate(3);

        return view('Home', compact('favorit', 'terbaru'));
    }

    public function kue()
    {
        $kue = Kue::all();

        return view('Kue', compact('kue'));
    }

    public function favorit()
    {
        $kue = Kue::orderBy('total_order')->get();
        $keterangan = 'Favorit';

        return view('Kue', compact('kue','keterangan'));
    }

    public function terbaru()
    {
        $kue = Kue::latest()->get();
        $keterangan = 'Terbaru';

        return view('Kue', compact('kue','keterangan'));
    }

    public function jenis($id)
    {
        $kue = Kue::where('jenis_kue', '=', $id)->get();
        $keterangan = $id;

        return view('Kue', compact('kue','keterangan'));
    }

    public function pembelian($id)
    {
        $kue = Kue::find($id);
        $testimoni = Testimoni::where('kue_id','=',$kue->id)->get();
        $user = User::all();
        return view('Pembelian', compact('kue','testimoni','user'));
    }
}
