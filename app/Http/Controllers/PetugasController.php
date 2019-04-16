<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function register(Request $data)
    {
        if(Auth::user()->id_level!=1){
            return view('layouts.denied');
        }
        
        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'id_level' => 2,
        ]);

        return redirect('petugas');
    }

    public function index()
    {
        $datauser = DB::table('users')
            ->join('levels', 'users.id_level', '=', 'levels.id_level')
            ->select('users.*', 'levels.*')
            ->get();

        return view('petugas', ['data' => $datauser]);
    }
}
