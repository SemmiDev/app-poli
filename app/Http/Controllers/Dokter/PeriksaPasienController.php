<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use App\Models\User;
use Illuminate\Http\Request;

class PeriksaPasienController extends Controller
{

    public function index()
    {
        $id = User::getIdFromUsername();

        $daftarPoliPasien = JadwalPeriksa::where('id_dokter', $id)
            ->with('daftar_polis', 'daftar_polis.pasien')
            ->orderBy('jadwal_periksa.hari', 'asc')
            ->orderBy('jadwal_periksa.jam_mulai', 'asc')
            ->get();

        return view('dokter.periksa-pasien.index', compact('daftarPoliPasien'));
    }

    public function detail($poli)
    {
        $periksa = Periksa::with(
            'detail_periksas',
            'detail_periksas.obat',
            'daftar_poli',
            'daftar_poli.pasien'
        )->where('id_daftar_poli', $poli)->first();

        return view('dokter.periksa-pasien.show', [
            'periksa' => $periksa,
            'poli' => $periksa->daftar_poli,
            'pasien' => $periksa->daftar_poli->pasien,
            'daftarObat' => $periksa->detail_periksas
        ]);
    }

    public function edit($poli)
    {
        $daftarObat = Obat::all();

        $poli = DaftarPoli::with('pasien')->where('id', $poli)->first();
        $pasien = $poli->pasien;

        return view('dokter.periksa-pasien.edit', [
            'poli' => $poli,
            'pasien' => $pasien,
            'daftarObat' => $daftarObat
        ]);
    }


    public function update(Request $request, DaftarPoli $poli)
    {
        $biayaDokter = 150000;
        $biayaObat = 0;
        $totalBiaya = 0;

        if ($request->get('obat') != null || $request->get('obat') != []) {
            foreach ($request->get('obat') as $idObat) {
                $obat = Obat::find($idObat);
                $biayaObat += $obat->harga;
            }
        }
        $totalBiaya = $biayaDokter + $biayaObat;

        $catatan = $request->get('catatan');
        $tglPeriksa = $request->get('tgl_periksa');

        $periksa = Periksa::create([
            'id_daftar_poli' => $poli->id,
            'tgl_periksa' => $tglPeriksa,
            'catatan' => $catatan,
            'biaya_periksa' => $totalBiaya
        ]);

        if ($request->get('obat') != null || $request->get('obat') != []) {
            foreach ($request->get('obat') as $idObat) {
                $periksa->detail_periksas()->create([
                    'id_obat' => $idObat
                ]);
            }
        }

        return redirect()->route('dokter.periksa.index')->with('success', 'Berhasil menambahkan data periksa pasien');
    }
}
