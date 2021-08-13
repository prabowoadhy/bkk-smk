<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LamaranPrakerin;
use App\Models\Prakerin;
use Illuminate\Http\Request;
use App\Models\PerusahaanModel;
use Illuminate\Support\Str;

class AdminPrakerinController extends Controller
{
    public function index(Request $request) {
        $data = [
            'title' => 'Lowongan Prakerin',
            'url' => 'admin/prakerin',
            'prakerin' => Prakerin::all(),
        ];
        return view('admin_prakerin/prakerinview', $data);
    }

    public function addform()
    {
        $data = [
            'title' => 'Tambah Data',
            'url' => 'admin/addprakerin',
            'perusahaan' => PerusahaanModel::all(),
        ];
        return view('admin_prakerin/prakerinadd', $data);
    }

    public function editform($id)
    {
        $data = [
            'title' => 'Update Data',
            'url' => 'admin/updatedetail',
            'prakerin' => Prakerin::find($id),
            'perusahaan' => PerusahaanModel::all(),
        ];
        return view('admin_prakerin/prakerinedit', $data); 
    }

    public function pelamarprakerin($id_prakerin)
    {
        
        $data = [
            'title' => 'Update Data',
            'url' => 'admin/pelamar',
            'lamaran' => LamaranPrakerin::where('id', $id_prakerin)->orderByDesc('updated_at')->get(),
        ];
        return view('admin_prakerin/pelamarview', $data); 
    }

    public function addaction()
    {
        Request()->validate([
            'jenis_prakerin' => 'required',
            'posisi' => 'required',
            'bidang' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'penempatan' => 'required',
            'deskripsi' => 'required',
            'perusahaan_id' => 'required',
        ]);
        $data = [
            'jenis_prakerin' => Request()->jenis_prakerin,
            'posisi' => Request()->posisi,
            'bidang' => Request()->bidang,
            'tgl_mulai' => Request()->tgl_mulai,
            'tgl_selesai' => Request()->tgl_selesai,
            'penempatan' => Request()->penempatan,
            'deskripsi' => Request()->deskripsi,
            'perusahaan_id' => Request()->perusahaan_id,
            'user_id' => Request()->user_id,
            'slug' => Str::of(Request()->posisi)->slug('-').'-'.Str::of(Request()->bidang)->slug('-'),
        ];
        Prakerin::create($data);
        return redirect('/admin/prakerin');
    }

    public function editaction($id)
    {
        Request()->validate([
            'jenis_prakerin' => 'required',
            'posisi' => 'required',
            'bidang' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'penempatan' => 'required',
            'deskripsi' => 'required',
            'perusahaan_id' => 'required',
        ]);
        $data = [
            'jenis_prakerin' => Request()->jenis_prakerin,
            'posisi' => Request()->posisi,
            'bidang' => Request()->bidang,
            'tgl_mulai' => Request()->tgl_mulai,
            'tgl_selesai' => Request()->tgl_selesai,
            'penempatan' => Request()->penempatan,
            'deskripsi' => Request()->deskripsi,
            'perusahaan_id' => Request()->perusahaan_id,
            'user_id' => Request()->user_id,
            'slug' => Str::of(Request()->posisi)->slug('-').'-'.Str::of(Request()->bidang)->slug('-'),
        ];
        Prakerin::updateOrCreate(['id' => $id], $data);
        return redirect('/admin/prakerin');
    }
}
