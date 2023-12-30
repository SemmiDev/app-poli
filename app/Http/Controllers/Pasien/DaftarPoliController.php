<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Pasien;
use App\Models\Periksa;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarPoliController extends Controller
{
    public function index()
    {
        $id = User::getIdFromUsername();

        $daftarPoli = DaftarPoli::where('id_pasien', $id)->orderBy('id', 'DESC')
        ->with('jadwal_periksa')
        ->orderBy('id', 'DESC')
        ->get();

        return view('pasien.daftar-poli.index', [
            'daftarPoli' => $daftarPoli
        ]);
    }

    public function show(DaftarPoli $poli) {
        $pasien = Pasien::where('id', $poli->id_pasien)->first();
        $dokter = Dokter::where('id', $poli->jadwal_periksa->id_dokter)->first();
        $periksa = Periksa::with('detail_periksas')->where('id_daftar_poli', $poli->id)->first();
        $daftarObat = $periksa->detail_periksas;

        return view('pasien.daftar-poli.show', [
            'poli' => $poli,
            'pasien' => $pasien,
            'dokter' => $dokter,
            'periksa' => $periksa,
            'daftarObat' => $daftarObat
        ]);
    }

    public function create()
    {
        $id = User::getIdFromUsername();
        $pasien = Pasien::where('id', $id)->first();

        $daftarPoli = Poli::all();

        return view('pasien.daftar-poli.create', [
            'pasien' => $pasien,
            'daftarPoli' => $daftarPoli
        ]);
    }

    public function store(Request $request) {
        $id = User::getIdFromUsername();
        $pasien = Pasien::where('id', $id)->first();

        // get no antrian
        $jadwal = JadwalPeriksa::where('id', $request->id_jadwal)->first();
        $noAntrian = DaftarPoli::where('id_jadwal', $request->id_jadwal)->count() + 1;

        $daftarPoli = new DaftarPoli();
        $daftarPoli->id_pasien = $pasien->id;
        $daftarPoli->id_jadwal = $request->id_jadwal;
        $daftarPoli->keluhan = $request->keluhan;
        $daftarPoli->no_antrian = $noAntrian;
        $daftarPoli->save();

        return redirect()->route('pasien.daftar-poli.index');
    }

    public function getDaftarJadwalByPoli(Request $request)
    {
        $id = $request->id_poli;
        $daftarPoli = Dokter::where('id_poli', $id)
        ->join('jadwal_periksa', 'dokter.id', '=', 'jadwal_periksa.id_dokter')
        ->get();

        return response()->json([
            'data' => $daftarPoli
        ]);
    }

    public function destroy(DaftarPoli $poli) {
        $poli->delete();
        return redirect()->route('pasien.daftar-poli.index')->with('success', 'Pendaftaran berhasil dibatalkan');
    }
}
