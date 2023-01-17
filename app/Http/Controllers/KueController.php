<?php

namespace App\Http\Controllers;

use App\Models\Kue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KueController extends Controller
{

    public function data()
    {
        $kue = Kue::latest()->get();

        return view('dashboard.Data_Kue', compact('kue'));
    }

    public function input(Request $request)
    {
        $kue = new Kue();

        $kue->nama_kue = $request->nama_kue;
        $kue->jenis_kue = $request->jenis_kue;
        $kue->harga_kue = $request->harga_kue;
        $kue->deskripsi_kue = $request->deskripsi_kue;

        $path = public_path() . '/foto-kue';
        File::makeDirectory($path, $mode = 0777, true, true);

        $foto_kue = $request->foto_kue->getClientOriginalName() . '-' . time() . '- foto_kue -'
            . '.' . $request->foto_kue->extension();
        $request->foto_kue->move($path, $foto_kue);

        $kue->foto_kue = $foto_kue;

        $kue->save();

        return back();
    }

    public function edit(Request $request, $id)
    {
        $kue = Kue::find($id);

        $kue->nama_kue = $request->nama_kue;
        $kue->jenis_kue = $request->jenis_kue;
        $kue->harga_kue = $request->harga_kue;
        $kue->deskripsi_kue = $request->deskripsi_kue;

        if (isset($request->foto_kue)) {
            unlink(public_path('foto-kue/'.$kue->foto_kue));
            $path = public_path() . '/foto-kue';
            File::makeDirectory($path, $mode = 0777, true, true);

            $foto_kue = $request->foto_kue->getClientOriginalName() . '-' . time() . '- foto_kue -'
                . '.' . $request->foto_kue->extension();
            $request->foto_kue->move($path, $foto_kue);
            $kue->foto_kue = $foto_kue;
        }


        $kue->save();

        return back();
    }

    public function delete($id)
    {
        $kue = Kue::find($id);
        unlink(public_path('foto-kue/'.$kue->foto_kue));

        $kue->delete();

        return back();
    }
}
