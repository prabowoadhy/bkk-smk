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
}
