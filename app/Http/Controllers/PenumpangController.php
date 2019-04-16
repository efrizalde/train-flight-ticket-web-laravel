<?php

namespace App\Http\Controllers;

use App\Penumpang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PenumpangController extends Controller
{

    public function addPenumpang(Request $request)
    {
        $penumpang = new Penumpang();

        $penumpang->username = $request->input("username");
        $penumpang->password = Hash::make($request->input("password"));
        $penumpang->nama_penumpang = $request->input("nama_penumpang");
        $penumpang->alamat_penumpang = $request->input("alamat_penumpang");
        $penumpang->tanggal_lahir = $request->input("tanggal_lahir");
        $penumpang->jenis_kelamin = $request->input("jenis_kelamin");
        $penumpang->telp = $request->input("telp");
        $penumpang->islogin = $request->input("islogin");
        $penumpang->save();

        return response()->json([
            'message' => 'Data Penumpang baru telah dibuat'
        ], 201);
    }

    public function editPenumpang(Request $request)
    {
        $username = $request->input("username");
        $penumpang = Penumpang::where("username", $username)->first();

        $penumpang->nama_penumpang = $request->input("nama_penumpang");
        $penumpang->alamat_penumpang = $request->input("alamat_penumpang");
        $penumpang->tanggal_lahir = $request->input("tanggal_lahir");
        $penumpang->jenis_kelamin = $request->input("jenis_kelamin");
        $penumpang->telp = $request->input("telp");
        $penumpang->save();

        return response()->json([
            'message' => 'Data Penumpang telah diperbarui'
        ], 200);
    }


    public function delPenumpang(Request $request)
    {
        $username = $request->input("username");
        $penumpang = Penumpang::where("username", $username)->first();

        $penumpang->delete();

        return response()->json([
            'message' => 'Data Penumpang telah dihapus'
        ], 200);
    }

    public function login(Request $request)
    {
        $username = $request->input("username");
        $pass = $request->input("password");

        $penumpang = Penumpang::where("username", $username)->first();

        if (Hash::check($pass, $penumpang->password)) {
            $penumpang->islogin = true;
            $penumpang->save();

            return response()->json([
                'message' => 'login berhasil'
            ], 200);
        } else {
            return response()->json([
                'message' => "Gagal Login!"
            ], 403);
        }
    }

    public function logout(Request $request)
    {
        $username = $request->input("username");

        $penumpang = Penumpang::where("username", $username)->first();

        $penumpang->islogin = false;
        $penumpang->save();

        return response()->json([
            'message' => 'logout berhasil'
        ], 200);
    }

    public function getuser(Request $request)
    {
        $username = $request->input("username");
        $penumpangs = DB::select("CALL getUserData('$username');");
        $penumpang = $penumpangs[0];

        $responseJSON = [
            'message' => 'success',
            'data' => ([
                "id_penumpang" => $penumpang->id_penumpang,
                "username" => $penumpang->username,
                "nama_penumpang" => $penumpang->nama_penumpang,
                "alamat_penumpang" => $penumpang->alamat_penumpang,
                "tanggal_lahir" => $penumpang->tanggal_lahir,
                "jenis_kelamin" => $penumpang->jenis_kelamin,
                "telp" => $penumpang->telp,
                "islogin" => $penumpang->islogin,
            ])
        ];

        return response()->json($responseJSON, 200);
    }
}
