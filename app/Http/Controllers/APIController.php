<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;

class APIController extends Controller
{
    public function searchpasien(Request $request){
        $cari = $request->input('q');

        $pasien = Pasien::where('nama', 'LIKE', "%$cari%")->get();

        if($pasien->isEmpty()){
            return response()->json([
                'success' => false,
                'data' => 'Data tidak ditemukan'
            ], 404)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }else{
            return response()->json([
                'success' => true,
                'data' => $pasien
            ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
    }
}
