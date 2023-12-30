<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use App\Models\Periksa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatPasienController extends Controller
{
    public function index() {
        $id = User::getIdFromUsername();

        // $daftarPoliPasien = JadwalPeriksa::where('id_dokter', $id)
        // ->with('daftar_polis', 'daftar_polis.pasien')
        // ->orderBy('jadwal_periksa.hari', 'asc')
        // ->orderBy('jadwal_periksa.jam_mulai', 'asc')
        // ->get();

        $daftarPoliPasien = DB::table('jadwal_periksa')
        ->join('daftar_poli', 'jadwal_periksa.id', '=', 'daftar_poli.id_jadwal')
        ->join('pasien', 'daftar_poli.id_pasien', '=', 'pasien.id')
        ->select('pasien.*')
        ->where('jadwal_periksa.id_dokter', $id)
        ->distinct()
        ->get();

        return view('dokter.riwayat-pasien.index', compact('daftarPoliPasien'));
    }

    public function show($idPasien) {
        $riwayat = DB::table('daftar_poli')->where('daftar_poli.id_pasien', $idPasien)->get();

        foreach ($riwayat as $r) {
            $r->pasien = DB::table('pasien')->where('id', $r->id_pasien)->first();
            $r->periksa = Periksa::where('id_daftar_poli', $r->id)->first();
            $r->periksa->detail_periksa = $r->periksa->detail_periksas;
            foreach ($r->periksa->detail_periksa as $dp) {
                $dp->obat = $dp->obat;
            }
        }

        return view('dokter.riwayat-pasien.show', [
            'riwayat' => $riwayat
        ]);
    }
}
