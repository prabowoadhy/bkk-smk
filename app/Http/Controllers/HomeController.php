<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokerModel;
use App\Models\PerusahaanModel;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->LokerModel = new LokerModel();
        $this->PerusahaanModel = new PerusahaanModel();
        
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

    public function prakerin(Request $request) {
        $data = [
            'title' => 'Prakerin'
        ];
        return view('homepage/prakerin', $data);
    }
}
