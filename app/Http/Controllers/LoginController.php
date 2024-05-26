<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function authetincate(Request $request) {
        $credentials = $this->validate($request, [
            'username'  => 'required',
            'password'  => 'required'
        ]);

        // cek jika ada request / login ke system
        if(Auth::attempt($credentials)) {
            // generate session
            $request->session()->regenerate();

            // jika berhasil
            return redirect()->intended('/');
        }

        // jika gagal
        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
