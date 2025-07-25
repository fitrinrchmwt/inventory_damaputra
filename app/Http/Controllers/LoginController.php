<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.login');
    }

    public function lupa_password()
    {
        return view('Login.lupaPassword');
    }

    public function proses_cek_login_db(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Login berhasil
            Session::put('id_user', $user->id_user);
            Session::put('username', $user->username);
            Session::put('email', $user->email);
            Session::put('level_user', $user->level_user);

            DB::table('login')->insert([
                'id_user' => $user->id_user,
                'username' => $user->username,
                'tanggal_login' => now()
            ]);

            return redirect('/dashboard'); // ganti ke halaman utama setelah login
        } else {
            return back()->with('error', 'Username atau Password salah.');
        }
   
    }

    public function logout(Request $request)
    {
        // Hapus semua data dari session
        $request->session()->flush();

        // Redirect ke halaman login
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
