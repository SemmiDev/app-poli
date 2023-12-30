<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poli;

class PoliController extends Controller
{
    public function index(){
        $daftarPoli = Poli::latest()->get();

        return view('admin.poli.index', [
            'daftarPoli' => $daftarPoli
        ]);
    }


    public function create() {
        return view('admin.poli.create');
    }

    public function store() {
        $data = request()->validate([
            'nama_poli' => 'required|min:3|max:255',
            'keterangan' => 'nullable',
        ]);

        Poli::create($data);

        return redirect()->route('admin.poli.index');
    }

    public function edit(Poli $poli) {
        return view('admin.poli.edit', [
            'poli' => $poli
        ]);
    }

    public function update(Poli $poli) {
        $data = request()->validate([
            'nama_poli' => 'required|min:3|max:255',
            'keterangan' => 'nullable',
        ]);

        $poli->update($data);

        return redirect()->route('admin.poli.index');
    }

    public function destroy(Poli $poli) {
        $poli->delete();

        return redirect()->route('admin.poli.index');
    }
}
