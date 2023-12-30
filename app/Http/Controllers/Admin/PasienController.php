<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index(){
        $daftarPasien = Pasien::join('users', 'users.username', '=', DB::raw("CONCAT(LOWER(REPLACE(pasien.nama, ' ', '_')), '_p', pasien.id)"))
        ->select('pasien.*', 'users.username')
        ->orderBy('pasien.id', 'DESC')
        ->get();

        return view('admin.pasien.index', [
            'daftarPasien' => $daftarPasien
        ]);
    }


    public function create() {
        return view('admin.pasien.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'no_ktp' => 'required',
        ]);


        $totalPasien = Pasien::count() + 1;
        $y = date('Y');
        $m = date('m');

        $no_rm = $y . $m . '-' . $totalPasien;

        $pasien = Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'no_rm' => $no_rm
        ]);

        $username = strtolower(str_replace(' ', '_', $request->nama)) . '_p' . $pasien->id;
        $password = bcrypt('password');

        \App\Models\User::create([
            'name' => $request->nama,
            'username' => $username,
            'password' => $password,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'role' => 'Pasien'
        ]);

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function edit(Pasien $pasien) {
        return view('admin.pasien.edit', [
            'pasien' => $pasien
        ]);
    }

    public function update(Request $request, Pasien $pasien) {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'no_ktp' => 'required',
        ]);

        $username = strtolower(str_replace(' ', '_', $request->nama)) . '_p' . $pasien->id;

        DB::table('users')
        ->where('username', strtolower(str_replace(' ', '_', $pasien->nama)) . $pasien->id)
        ->update([
            'name' => $request->nama,
            'username' => $username,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'role' => 'Pasien'
        ]);

        $pasien->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
        ]);

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil diupdate');
    }

    public function destroy(Pasien $pasien) {
        $pasien->delete();

        DB::table('users')
        ->where('username', strtolower(str_replace(' ', '_', $pasien->nama)) . '_p' . $pasien->id)
        ->delete();

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil dihapus');
    }
}
