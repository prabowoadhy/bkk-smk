<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SiswaController extends Controller
{
    
    // protected $siswa;
    public function userlog(){
        if (Auth::guard('alumni')->user()) {
            $siswa = Auth::guard('alumni')->user();
        } elseif (Auth::guard('siswa')->user()) {
            $siswa = Auth::guard('siswa')->user();
        }
        return $siswa;
    }

    public function index(Request $request) {
        $data = [
            'title' => 'Dashboard Siswa',
            'url' => 'siswa-profil',
            'user' => $this->userlog(),
        ];
        return view('siswa/siswa-profil', $data);
    }

    public function siswaprofil(Request $request) {

        
        $siswa = $this->userlog();
        $data = [
            'title' => 'Lamaran Pekerjaan Siswa',
            'url' => 'siswa-profil',
            'user' => $this->userlog(),
        ];
        return view('siswa/siswa-profil', $data);
    }

    public function siswaloker(Request $request) {
        $data = [
            'title' => 'Lamaran Pekerjaan Siswa',
            'url' => 'siswa-loker',
            'user' => $this->userlog(),
        ];
        return view('siswa/siswa-loker', $data);
    }

    public function siswaprakerin(Request $request) {
        $data = [
            'title' => 'Lamaran Prakerin Siswa',
            'url' => 'siswa-prakerin',
            'user' => $this->userlog(),
        ];
        return view('siswa/siswa-prakerin', $data);
    }

    public function siswaregistrasi(Request $request) {
        $data = [
            'title' => 'Registrasi Siswa',
            'url' => 'siswa-registrasi'
        ];
        return view('auth/siswa-registrasi', $data);
    }

    public function siswalogin(Request $request) {
        $data = [
            'title' => 'Login Siswa',
            'url' => 'siswa-login'
        ];
        return view('auth/siswa-login', $data);
    }

}
