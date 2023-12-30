<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    public function index(){
        $id = User::getIdFromUsername();

        $daftarJadwalPeriksa = JadwalPeriksa::orderBy('hari')->orderBy('jam_mulai')
        ->where('id_dokter', $id)
        ->get();

        return view('dokter.jadwal-periksa.index', [
            'daftarJadwalPeriksa' => $daftarJadwalPeriksa
        ]);
    }

    public function create() {
        return view('dokter.jadwal-periksa.create');
    }

    public function store(Request $request) {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        if ($request->jam_mulai >= $request->jam_selesai) {
            return redirect()->back()->with('error', 'Jam mulai harus lebih kecil dari jam selesai');
        }

        JadwalPeriksa::create([
            'id_dokter' => User::getIdFromUsername(),
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal periksa berhasil ditambahkan');
    }

    public function edit(JadwalPeriksa $jadwal) {
        return view('dokter.jadwal-periksa.edit', [
            'jadwal' => $jadwal
        ]);
    }

    public function update(Request $request, JadwalPeriksa $jadwal) {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal->update([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal periksa berhasil diubah');
    }

    public function destroy(JadwalPeriksa $jadwal) {
        $jadwal->delete();
        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal periksa berhasil dihapus');
    }
}
