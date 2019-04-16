<?php

namespace App\Http\Controllers;

use App\Transportasi;
use Illuminate\Http\Request;
use App\TipeTransportasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransportasiController extends Controller
{
    public function add(Request $request)
    {
        $trasnport = new Transportasi();

        $trasnport->kode = $request->input("kode");
        $trasnport->keterangan = $request->input("keterangan");
        $trasnport->jumlah_kursi = $request->input("jumlah_kursi");
        $trasnport->id_type_transportasi = $request->input("id_type_transportasi");
        $trasnport->save();

        return response()->json([
            'message' => 'Data Transportasi baru telah dibuat'
        ], 201);
    }

    public function addtp(Request $request)
    {
        if (Auth::user()->id_level != 1) {
            return view('layouts.denied');
        }

        $trasnport = new Transportasi();

        $trasnport->kode = $request->input("kode");
        $trasnport->keterangan = $request->input("keterangan");
        $trasnport->jumlah_kursi = $request->input("jumlah_kursi");
        $trasnport->id_type_transportasi = $request->input("id_type_transportasi");
        $trasnport->save();

        return redirect('transportasi');
    }

    public function edittp(Request $request)
    {
        if (Auth::user()->id_level != 1) {
            return view('layouts.denied');
        }

        $trasnport = Transportasi::where('id_transportasi', $request->input('id_transportasi'))->first();

        $trasnport->kode = $request->input("kode");
        $trasnport->keterangan = $request->input("keterangan");
        $trasnport->jumlah_kursi = $request->input("jumlah_kursi");
        $trasnport->id_type_transportasi = $request->input("id_type_transportasi");
        $trasnport->save();

        return redirect('transportasi');
    }

    public function deltp($id)
    {
        if (Auth::user()->id_level != 1) {
            return view('layouts.denied');
        }
        
        $trasnport = Transportasi::find($id)->first()->delete();

        return redirect('transportasi');
    }

    public function index()
    {
        $ttype = TipeTransportasi::all();
        $bulkdata = DB::table('transportasis')
            ->join('tipe_transportasis', 'transportasis.id_type_transportasi', '=', 'tipe_transportasis.id_type_transportasi')
            ->select('transportasis.*', 'tipe_transportasis.nama_transportasi')
            ->get();

        return view('transportasi', ['bulk' => $bulkdata, 'tdata' => $ttype]);
    }
}
