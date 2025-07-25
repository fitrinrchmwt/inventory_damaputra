<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
        {
        if (!Session::has('id_user')) {
            return redirect()->route('login');
        }

        // Ambil data user dari session
        $id_user = Session::get('id_user');
        $user = User::where('id_user', $id_user)->first();

        return view('User.profile', compact('user'));
    
    
    }


    public function kelola_user()
    {
        //$datauser = User :: select('id_user','email','username','level_user','created_at','updated_at')->get();
        $users = User::all(); // ambil semua data dari tabel user
        return view('User.user', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|unique:user,id_user',
            'email' => 'required|email|unique:user,email',
            'username' => 'required|unique:user,username',
            'password' => 'required|min:6',
            'level_user' => 'required|in:Admin,Gudang,Pemilik',
        ]);

        User::create([
            'id_user' => $request->id_user,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password), // hash password!
            'level_user' => $request->level_user,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:user,id_user',
            'email' => 'required|email',
            'username' => 'required',
            'level_user' => 'required|in:Admin,Gudang,Pemilik',
        ]);

        $user = User::find($request->id_user);
        $user->email = $request->email;
        $user->username = $request->username;
        $user->level_user = $request->level_user;
        $user->updated_at = now();
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diupdate.');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }
    }

    public function riwayatLogin()
    {
        $riwayat = LoginModel::orderBy('tanggal_login', 'desc')->get();
        return view('User.riwayat_login', compact('riwayat'));
    }


}
