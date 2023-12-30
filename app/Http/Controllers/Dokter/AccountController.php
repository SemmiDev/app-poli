<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function show() {
        return view('account');
    }

    public function update(Request $request) {
        $user = auth()->user();
        $role = $user->role;
        $id = User::getIdFromUsername();

        $nama  = $request->nama;
        $alamat = $request->alamat;
        $noHp = $request->no_hp;


        if ($role == "Dokter") {
            $username = strtolower(str_replace(' ', '_', $nama)) . '_p' . $id;
            DB::table('dokter')
            ->where('id', '=', $id)
            ->update([
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $noHp
            ]);

            DB::table('users')
            ->where('id', '=', $user->id)
            ->update([
                'username' => $username,
                'name' => $nama,
                'alamat' => $alamat,
                'no_hp' => $noHp
            ]);
        } else if ($role == "Pasien") {
            $username = strtolower(str_replace(' ', '_', $nama)) . '_d' . $id;
            DB::table('pasien')
            ->where('id', '=', $id)
            ->update([
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $noHp
            ]);

            DB::table('users')
            ->where('id', '=', $user->id)
            ->update([
                'username' => $username,
                'name' => $nama,
                'alamat' => $alamat,
                'no_hp' => $noHp
            ]);
        } else if($role == "Admin") {
            DB::table('users')
            ->where('id', '=', $user->id)
            ->update([
                'name' => $nama,
                'alamat' => $alamat,
                'no_hp' => $noHp
            ]);
        }

        return redirect()->route('account.show');
    }
}
