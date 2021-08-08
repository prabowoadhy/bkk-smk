<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => 'Home'
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
