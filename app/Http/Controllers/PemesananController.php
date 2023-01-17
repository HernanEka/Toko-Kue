<?php

namespace App\Http\Controllers;

use App\Models\Kue;
use App\Models\Pemesanan;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PemesananController extends Controller
{
    public function pesan(Request $request, $id)
    {
        $pesan = new Pemesanan();

        $pesan->user_id = auth()->user()->id;
        $pesan->kue_id = $id;
        $pesan->jumlah_beli = $request->jumlah;
        $pesan->alamat = $request->alamat;

        $pesan->save();

        return redirect('/keranjang');
    }

    public function keranjang()
    {
        $pesan = Pemesanan::where('user_id', '=', auth()->user()->id)->get();
        $kue = Kue::all();
        $testimoni = Testimoni::where('user_id','=', auth()->user()->id)->get();

        return view('Keranjang', compact('pesan', 'kue', 'testimoni'));
    }

    public function bayar(Request $request, $id)
    {
        $pesan = Pemesanan::find($id);

        $path = public_path() . '/foto-bukti-bayar';
        File::makeDirectory($path, $mode = 0777, true, true);

        $bukti_bayar = $request->bukti_bayar->getClientOriginalName() . '-' . time() . '- bukti_bayar -'
            . '.' . $request->bukti_bayar->extension();
        $request->bukti_bayar->move($path, $bukti_bayar);

        $pesan->bukti_bayar = $bukti_bayar;
        $pesan->status = 'Verifikasi Pembayaran';

        $pesan->save();

        return back();
    }

    public function data()
    {
        $pesan = Pemesanan::all();
        $user = User::all();
        $kue = Kue::all();

        return view('dashboard.Data_Pemesanan', compact('pesan','user','kue'));
    }

    public function update(Request $request,$id)
    {
        $pesan = Pemesanan::find($id);

        $pesan->status = $request->status;

        $pesan->save();

        return back();
    }
}
