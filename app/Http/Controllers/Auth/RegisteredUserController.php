<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Pasien;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required'],
        ]);

        $data = $request->all();


        $totalPasien = Pasien::count() + 1;
        $y = date('Y');
        $m = date('m');

        $no_rm = $y . $m . '-' . $totalPasien;


        $pasien = Pasien::create([
            'nama' => $data['name'],
            'alamat' => $data['alamat'],
            'no_ktp' => $data['no_ktp'],
            'no_hp' => $data['no_hp'],
            'no_rm' => $no_rm,
        ]);

        $username = strtolower(str_replace(' ', '_', $request->get('name'))) . '_p' . $pasien->id;

        $user = User::create([
            'name' => $data['name'],
            'username' => $username,
            'no_ktp' => $data['no_ktp'],
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            'role' => "Pasien",
            'password' => Hash::make($data['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
