<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSiswaController extends Controller
{
    public function index(Request $request) {
        $data = [
            'title' => 'Data Siswa',
            'url' => 'admin/siswa'
        ];
        return view('admin_siswa/siswaview', ['data' => $data]);
    }
}
