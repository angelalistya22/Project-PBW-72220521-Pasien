<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }

    public function pasien()
    {
        $pasien = Pasien::orderBy('id', 'desc')->get();
        return view("pasien", ["key" => "pasien", "ps" => $pasien]);
    }

    public function formaddpasien()
    {
        return view("layouts.form-add", ["key" => "pasien"]);
    }
    
    public function savepasien(Request $request)
    {
        $file = $request->file('diagnosis');
        $file_name = $file->getClientOriginalName();
        $path = $file->storeAs('diagnosis', $file_name, 'public');

        Pasien::create([
            'nama' => $request->nama,
            'usia' => $request->usia,
            'gender' => $request->gender,
            'diagnosis' => $path,
        ]);
        return redirect('/pasien')->with('alert', 'Data Berhasil disimpan');
    }

    public function formeditpasien($id)
    {
        $pasien = Pasien::find($id);
        return view("form-edit", ["key" => "pasien", "ps" => $pasien]);
    }

    public function updatepasien($id, Request $request)
    {
        $pasien = Pasien::find($id);
        $pasien->nama = $request->nama;
        $pasien->usia = $request->usia;
        $pasien->gender = $request->gender;
        
        if ($request->diagnosis)
        {
            if ($pasien->diagnosis)
            {
                Storage::disk('public')->delete($pasien->diagnosis);
            }
            $file_name = $request->file('diagnosis')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('diagnosis', $file_name, 'public');
            $pasien->diagnosis = $path;
        }

        $pasien->save();
        return redirect('/pasien')->with('alert', 'Data Berhasil di Update');
    }

    public function deletepasien($id)
    {
        $pasien = Pasien::find($id);
        if ($pasien->poster)
        {
            Storage::disk('public')->delete($pasien->diagnosis);
        }
        
        $pasien->delete();
        return redirect('/pasien')->with('alert', 'Data Berhasil di Hapus');
    }

    public function login()
    {
        return view('login');
    }

    public function formedituser()
    {
        return view("formedituser", ["key" => ""]);
    }

    public function updateuser(Request $request)
    {
        if ($request->password_baru == $request->konfirmasi_password)
        {
            $user = Auth::user();
            $user->password = bcrypt($request->password_baru);
            $user->save();
            return redirect('/user')->with('info', 'Password Berhasil di Ubah');
            }
            else
            {
                return redirect('/user')->with('info', 'Password Gagal di Ubah');
            }
        }
}
