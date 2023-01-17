<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function input(Request $request,$id)
    {
        $testimoni = new Testimoni();

        $testimoni->user_id = auth()->user()->id;
        $testimoni->kue_id = $request->kue_id;
        $testimoni->pemesanan_id = $id;
        $testimoni->testimoni = $request->testimoni;

        $testimoni->save();

        return back();
    }
}
