<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\LokerModel;
use App\Models\PerusahaanModel;
use App\Models\Prakerin;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index(Request $request) {
        $data = [
            'title' => 'Dashboard Admin',
            'url' => 'admin',
            'loker' => LokerModel::all()->sortBy('tgl_selesai'),
            'prakerin' => Prakerin::all()->sortBy('tgl_selesai'),
            'alumni' => Alumni::all(),
            'siswa' => Siswa::all(),
            'perusahaan' => PerusahaanModel::all(),
        ];
        return view('admin/index', $data);
    }

    public function login(Request $request) {
        $data = [
            'title' => 'Login Admin',
            'url' => 'admin/login'
        ];
        return view('admin/login_admin', $data);
    }

}
