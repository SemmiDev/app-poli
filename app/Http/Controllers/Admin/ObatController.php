<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(){
        $daftarObat = Obat::latest()->get();

        return view('admin.obat.index', [
            'daftarObat' => $daftarObat
        ]);
    }


    public function create() {
        return view('admin.obat.create');
    }

    public function store() {
        $data = request()->validate([
            'nama_obat' => 'required|min:3|max:255',
            'kemasan' => 'required|min:3|max:255',
            'harga' => 'required|numeric',
        ]);

        Obat::create($data);

        return redirect()->route('admin.obat.index');
    }

    public function edit(Obat $obat) {
        return view('admin.obat.edit', [
            'obat' => $obat
        ]);
    }

    public function update(Obat $obat) {
        $data = request()->validate([
            'nama_obat' => 'required|min:3|max:255',
            'kemasan' => 'required|min:3|max:255',
            'harga' => 'required|numeric',
        ]);

        $obat->update($data);

        return redirect()->route('admin.obat.index');
    }

    public function destroy(Obat $obat) {
        $obat->delete();

        return redirect()->route('admin.obat.index');
    }
}
