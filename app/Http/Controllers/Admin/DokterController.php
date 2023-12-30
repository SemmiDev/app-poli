<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    public function index(){
        $daftarDokter = Dokter::join('users', 'users.username', '=', DB::raw("CONCAT(LOWER(REPLACE(dokter.nama, ' ', '_')), '_d', dokter.id)"))
        ->with('poli')
        ->select('dokter.*', 'users.username')
        ->orderBy('dokter.id', 'DESC')
        ->get();

        return view('admin.dokter.index', [
            'daftarDokter' => $daftarDokter
        ]);
    }

    public function create() {
        $daftarPoli = Poli::latest()->get();
        return view('admin.dokter.create', [
            'daftarPoli' => $daftarPoli
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_poli' => 'required'
        ]);

        $dokter = Dokter::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli
        ]);

        $username = strtolower(str_replace(' ', '_', $request->nama)) . '_d' . $dokter->id;
        $password = bcrypt('password');

        \App\Models\User::create([
            'name' => $request->nama,
            'username' => $username,
            'password' => $password,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'role' => 'Dokter'
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil ditambahkan');
    }

    public function edit(Dokter $dokter) {
        $daftarPoli = Poli::latest()->get();
        return view('admin.dokter.edit', [
            'dokter' => $dokter,
            'daftarPoli' => $daftarPoli
        ]);
    }

    public function update(Request $request, Dokter $dokter) {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_poli' => 'required'
        ]);

        $username = strtolower(str_replace(' ', '_', $request->nama))  . '_d' .  $dokter->id;

        DB::table('users')
        ->where('username', strtolower(str_replace(' ', '_', $dokter->nama))  . '_d' .  $dokter->id)
        ->update([
            'name' => $request->nama,
            'username' => $username,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'role' => 'Dokter'
        ]);

        $dokter->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil diupdate');
    }


    public function destroy(Dokter $dokter) {
        $dokter->delete();

        DB::table('users')
        ->where('username', strtolower(str_replace(' ', '_', $dokter->nama)) . '_d' . $dokter->id)
        ->delete();

        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil dihapus');
    }
}
