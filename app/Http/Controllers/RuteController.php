<?php

namespace App\Http\Controllers;

use App\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Transportasi;
use Illuminate\Support\Facades\DB;
use App\Pemesanan;
use Illuminate\Support\Facades\Auth;

class RuteController extends Controller
{
    public function index()
    {
        $tranport = Transportasi::all();
        $rute = Rute::all();
        $bulkdata = DB::select('CALL getBulkRouteData');

        return view('rute', ['tranport_data' => $tranport, 'rute_data' => $rute, 'bulk' => $bulkdata]);
    }

    public function add(Request $request)
    {
        $rute = new Rute();

        $rute->kode = $request->input("kode");
        $rute->tujuan = $request->input("tujuan");
        $rute->rute_awal = $request->input("rute_awal");
        $rute->rute_akhir = $request->input("rute_akhir");
        $rute->harga = $request->input("harga");
        $rute->id_transportasi = $request->input("id_transportasi");
        $rute->save();

        return response()->json([
            'message' => 'Data Rute baru telah dibuat'
        ], 201);
    }

    public function get(Request $request)
    {
        $bulkdata = DB::select('CALL getBulkRouteData');

        return response()->json([
            'data' => $bulkdata
        ], 201);
    }


    //FOR WEBSITE
    public function addrute(Request $request)
    {
        if(Auth::user()->id_level!=1){
            return view('layouts.denied');
        }

        $rute = new Rute();
        $rute->kode = $request->input("kode");
        $rute->tujuan = $request->input("tujuan");
        $rute->rute_awal = $request->input("rute_awal");
        $rute->rute_akhir = $request->input("rute_akhir");
        $rute->harga = $request->input("harga");
        $rute->id_transportasi = $request->input("id_transportasi");
        $rute->save();

        return redirect('/rute');
    }

    public function editrute(Request $request)
    {
        if(Auth::user()->id_level!=1){
            return view('layouts.denied');
        }

        $rute = Rute::where("id_rute",$request->input("id_rute"))->first();

        $rute->kode = $request->input("kode");
        $rute->tujuan = $request->input("tujuan");
        $rute->rute_awal = $request->input("rute_awal");
        $rute->rute_akhir = $request->input("rute_akhir");
        $rute->harga = $request->input("harga");
        $rute->id_transportasi = $request->input("id_transportasi");
        $rute->save();

        return redirect('/rute');
    }

    public function delrute($id)
    {   
        if(Auth::user()->id_level!=1){
            return view('layouts.denied');
        }
        
        $rute = Rute::where("id_rute",$id)->first();
        $rute->delete();

        return redirect('/rute');
    }
}
