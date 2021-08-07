<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPerusahaanController extends Controller
{
    public function index(Request $request) {
        $data = [
            'title' => 'Data Perusahaan',
            'url' => 'admin/perusahaan'
        ];
        return view('admin_perusahaan/perusahaanview', ['data' => $data]);
    }
}
