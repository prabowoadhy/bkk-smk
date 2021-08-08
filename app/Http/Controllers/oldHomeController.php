<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //index
    public function index(Request $request) {
        $data = [
            'title' => 'Beranda'
        ];
        return view('homepage/index', ['data' => $data]);
    }

    public function lowongan(Request $request) {
        $data = [
            'title' => 'Lowongan'
        ];
        return view('homepage/lowongan', ['data' => $data]);
    }

    public function perusahaan(Request $request) {
        $data = [
            'title' => 'Perusahaan'
        ];
        return view('homepage/perusahaan', ['data' => $data]);
    }

    public function detailperusahaan(Request $request) {
        $data = [
            'title' => 'dPerusahaan'
        ];
        return view('homepage/detailperusahaan', ['data' => $data]);
    }

    public function prakerin(Request $request) {
        $data = [
            'title' => 'Prakerin'
        ];
        return view('homepage/prakerin', ['data' => $data]);
    }
}
