<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request) {
        $data = [
            'title' => 'Dashboard Siswa',
            'url' => 'siswa-profil'
        ];
        return view('siswa/siswa-profil', ['data' => $data]);
    }

    public function siswaprofil(Request $request) {
        $data = [
            'title' => 'Lamaran Pekerjaan Siswa',
            'url' => 'siswa-profil'
        ];
        return view('siswa/siswa-profil', ['data' => $data]);
    }

    public function siswaloker(Request $request) {
        $data = [
            'title' => 'Lamaran Pekerjaan Siswa',
            'url' => 'siswa-loker'
        ];
        return view('siswa/siswa-loker', ['data' => $data]);
    }

    public function siswaprakerin(Request $request) {
        $data = [
            'title' => 'Lamaran Prakerin Siswa',
            'url' => 'siswa-prakerin'
        ];
        return view('siswa/siswa-prakerin', ['data' => $data]);
    }

    public function siswaregistrasi(Request $request) {
        $data = [
            'title' => 'Registrasi Siswa',
            'url' => 'siswa-registrasi'
        ];
        return view('auth/siswa-registrasi', ['data' => $data]);
    }

    public function siswalogin(Request $request) {
        $data = [
            'title' => 'Login Siswa',
            'url' => 'siswa-login'
        ];
        return view('auth/siswa-login', ['data' => $data]);
    }

}
