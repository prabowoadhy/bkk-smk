<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    //
    public function index(Request $request) {
        $data = [
            'title' => 'Dashboard Perusahaan',
            'url' => 'perusahaan-profil'
        ];
        return view('perusahaan/perusahaan-profil', $data);
    }

    public function perusahaanprofil(Request $request) {
        $data = [
            'title' => 'Lamaran Pekerjaan Perusahaan',
            'url' => 'perusahaan-profil'
        ];
        return view('perusahaan/perusahaan-profil', $data);
    }

    public function perusahaanloker(Request $request) {
        $data = [
            'title' => 'Lamaran Pekerjaan Perusahaan',
            'url' => 'perusahaan-loker'
        ];
        return view('perusahaan/perusahaan-loker', $data);
    }

    public function perusahaanprakerin(Request $request) {
        $data = [
            'title' => 'Lamaran Prakerin Perusahaan',
            'url' => 'perusahaan-prakerin'
        ];
        return view('perusahaan/perusahaan-prakerin', $data);
    }

    public function perusahaanregistrasi(Request $request) {
        $data = [
            'title' => 'Registrasi Perusahaan',
            'url' => 'perusahaan-registrasi'
        ];
        return view('auth/perusahaan-registrasi', $data);
    }

    public function perusahaanlogin(Request $request) {
        $data = [
            'title' => 'Login Perusahaan',
            'url' => 'perusahaan-login'
        ];
        return view('auth/perusahaan-login', $data);
    }

    public function pelamarloker(Request $request) {
        $data = [
            'title' => 'Pelamar Loker',
            'url' => 'pelamar-loker'
        ];
        return view('perusahaan/perusahaan-loker-pelamar', $data);
    }
}
