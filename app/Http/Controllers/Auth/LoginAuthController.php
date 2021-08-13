<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAuthController extends Controller
{
    public function postLogin(Request $request) {
        if (Auth::guard('siswa')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/siswa-profil');
        };
        return redirect('/siswa-login');
    }

    public function alumnipostLogin(Request $request) {
        if (Auth::guard('alumni')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/alumni-profil');
        };
        return redirect('/alumni-login');
    }

    public function postLoginAdmin(Request $request) {
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin');
        } 
        return redirect('/admin-login');
        
    }

    public function logout(){
            Auth::guard('siswa')->logout();
            Auth::guard('alumni')->logout();
            Auth::guard('user')->logout();
        return redirect('/');
    }
}
