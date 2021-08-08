<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Auth;

class LoginAuthController extends Controller
{
    public function postLogin(Request $request) {
        if (Auth::guard('siswa')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/siswa-profil');
        } elseif (Auth::guard('alumni')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/siswa-profil');
        } 
        return redirect('/siswa-login');
        
    }
    public function postLoginAdmin(Request $request) {
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin');
        } 
        return redirect('/admin-login');
        
    }

    public function logout(){
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        } elseif (Auth::guard('alumni')->check()) {
            Auth::guard('alumni')->logout();
        } elseif (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }
        return redirect('/');
    }
}
