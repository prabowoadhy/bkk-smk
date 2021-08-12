<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokerModel;
use App\Models\PerusahaanModel;
use App\Models\Prakerin;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->LokerModel = new LokerModel();
        $this->PerusahaanModel = new PerusahaanModel();
        
    }

    public function userlog(){
        $siswa = [
            'id' => '0',
        ];
        if (Auth::guard('alumni')->user()) {
            $siswa = Auth::guard('alumni')->user();
        } elseif (Auth::guard('siswa')->user()) {
            $siswa = Auth::guard('siswa')->user();
        }
        return $siswa;
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('homepage/index', $data);
    }

    public function lowongan(Request $request) {
        $data = [
            'title' => 'Lowongan',
            'loker' => $this->LokerModel->allData(),
        ];
        
        return view('homepage/lowongan', $data);
    
    }
    public function lokerdetail($id) {
        $data = [
            'title' => 'Lowongan',
            'loker' => $this->LokerModel->detailData($id),
            'user' => $this->userlog(),
        ];
        
        return view('homepage/siswa-loker-lamar', $data);
    }

    public function perusahaan(Request $request) {
        $data = [
            'title' => 'Perusahaan',
            'perusahaan' => $this->PerusahaanModel->allData(),
        ];
        return view('homepage/perusahaan', $data);
    }

    public function detailperusahaan(Request $request) {
        $data = [
            'title' => 'dPerusahaan'
        ];
        return view('homepage/detailperusahaan', $data);
    }

    public function prakerin() {
        $data = [
            'title' => 'Prakerin',
            'prakerin' => Prakerin::latest()->filter(request(['search']))->get(),
        ];
        return view('homepage/prakerin', $data);
    }
}
