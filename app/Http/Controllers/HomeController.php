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
            'active' => 'Home',
        ];
        return view('homepage/index', $data);
    }

    public function lowongan(Request $request) {
        $data = [
            'title' => 'Lowongan',
            'active' => 'Lowongan',
            'loker' => LokerModel::paginate(10),
        ];
        
        return view('homepage/lowongan', $data);
    
    }
    public function lokerdetail($id) {
        $data = [
            'title' => 'Lowongan',
            'active' => 'Lowongan',
            'loker' => $this->LokerModel->detailData($id),
            'user' => $this->userlog(),
        ];
        
        return view('homepage/alumni-loker-lamar', $data);
    }

    
    public function perusahaan(Request $request) {
        $data = [
            'title' => 'Perusahaan',
            'active' => 'Perusahaan',
            'perusahaan' => $this->PerusahaanModel->allData(),
        ];
        return view('homepage/perusahaan', $data);
    }
    
    public function detailperusahaan(Request $request) {
        $data = [
            'title' => 'Perusahaan',
            'active' => 'Perusahaan',
        ];
        return view('homepage/detailperusahaan', $data);
    }
    
    public function prakerin() {
        $data = [
            'title' => 'Prakerin',
            'active' => 'Prakerin',
            'prakerin' => Prakerin::latest()->filter(request(['search']))->get(),
        ];
        // return dd($data);
        return view('homepage/prakerin', $data);
    }

    public function prakerindetail($id) {
        $data = [
            'title' => 'Praktek Kerja Industri (Magang)',
            'active' => 'Prakerin',
            'prakerin' => Prakerin::all()->find($id),
            'user' => $this->userlog(),
        ];
        
        return view('homepage/siswa-loker-lamar', $data);
    }
}
