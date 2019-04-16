<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Rute;
use App\Transportasi;
use Symfony\Component\Console\Output\ConsoleOutput;
use PDF;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{


    public function order(Request $request)
    {
        $pemesanan = new Pemesanan();

        $output = new ConsoleOutput();
        $x = $request->input("id_rute");

        $output = new ConsoleOutput();
        $soldticket = Pemesanan::where("id_rute", $x)->get()->count();
        $rute = Rute::where("id_rute", $x)->first();
        $tid = $rute->id_transportasi;
        $transport = Transportasi::where("id_transportasi", $tid)->first();
        $seatTotal = $transport->jumlah_kursi;
        $seatnumber = ($seatTotal - $soldticket);
        $seatcode = "SC-$seatnumber";
        $output->writeln($seatTotal);
        $output->writeln($soldticket);
        $output->writeln($seatcode);

        $pemesanan->kode_pemesanan = Str::random(5);
        $pemesanan->tanggal_pemesanan = $request->input("tanggal_pemesanan");
        $pemesanan->tempat_pemesanan = $request->input("tempat_pemesanan");
        $pemesanan->id_penumpang = $request->input("id_penumpang");
        $pemesanan->kode_kursi = $seatcode;
        $pemesanan->id_rute = $request->input("id_rute");
        $pemesanan->tujuan = $request->input("tujuan");
        $pemesanan->tanggal_berangkat = $request->input("tanggal_berangkat");
        $pemesanan->jam_cekin = $request->input("jam_cekin");
        $pemesanan->jam_berangkat = $request->input("jam_berangkat");
        $pemesanan->total_bayar = $request->input("total_bayar");
        $pemesanan->save();

        return response()->json([
            'message' => 'Data Rute baru telah dibuat'
        ], 201);
    }

    public function getorderbyuser(Request $request)
    {
        $bulkdata = DB::table('pemesanans')
            ->join('penumpangs', 'pemesanans.id_penumpang', '=', 'penumpangs.id_penumpang')
            ->join('rutes', 'rutes.id_rute', '=', 'pemesanans.id_rute')
            ->leftJoin('users', 'users.id_petugas', '=', 'pemesanans.id_petugas')
            ->join('transportasis', 'rutes.id_transportasi', '=', 'transportasis.id_transportasi')
            ->select('pemesanans.*', 'rutes.*','penumpangs.nama_penumpang', 'transportasis.keterangan', 'transportasis.kode as kode_tp', 'users.name')
            ->where('pemesanans.id_penumpang', '=', $request->input('id_penumpang'))
            ->orderBy('pemesanans.tanggal_pemesanan', 'desc')
            ->get();

        return response()->json([
            'data' => $bulkdata
        ], 201);
    }

    public function index(Request $request)
    {
        $bulkdata = DB::table('pemesanans')
            ->join('penumpangs', 'pemesanans.id_penumpang', '=', 'penumpangs.id_penumpang')
            ->join('rutes', 'rutes.id_rute', '=', 'pemesanans.id_rute')
            ->leftJoin('users', 'users.id_petugas', '=', 'pemesanans.id_petugas')
            ->join('transportasis', 'rutes.id_transportasi', '=', 'transportasis.id_transportasi')
            ->select('pemesanans.*', 'penumpangs.nama_penumpang', 'transportasis.keterangan', 'transportasis.kode as kode_tp', 'users.name')
            ->get();

        return view('pesanan', ['bulk' => $bulkdata]);
    }

    public function downloadPDF($id)
    {
        $bulkdata = DB::table('pemesanans')
            ->join('penumpangs', 'pemesanans.id_penumpang', '=', 'penumpangs.id_penumpang')
            ->join('rutes', 'rutes.id_rute', '=', 'pemesanans.id_rute')
            ->join('transportasis', 'rutes.id_transportasi', '=', 'transportasis.id_transportasi')
            ->select('pemesanans.*', 'penumpangs.nama_penumpang', 'transportasis.keterangan', 'transportasis.kode as kode_tp')
            ->where('id_pesanan', '=', $id)
            ->first();

        // $pdf = PDF::loadView('pdf',['bulk' => $bulkdata]);
        // return $pdf->download('invoice.pdf');
        return view('pdf', ['bulk' => $bulkdata]);
    }

    public function validasi($id)
    {
        $id_petugas = Auth::id();
        $data = Pemesanan::where('id_pesanan', $id)->first();

        $data->id_petugas = $id_petugas;
        $data->save();

        return redirect('pesanan');
    }
}
