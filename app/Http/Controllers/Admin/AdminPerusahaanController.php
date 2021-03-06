<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LamaranModel;
use App\Models\LokerModel;
use Illuminate\Http\Request;
use App\Models\PerusahaanModel;
use App\Models\Prakerin;
use Illuminate\Support\Str;

class AdminPerusahaanController extends Controller
{

    public function __construct()
    {
        $this->PerusahaanModel = new PerusahaanModel();
    }

    public function index(Request $request) {
        $data = [
            'title' => 'Data Perusahaan',
            'url' => 'admin/perusahaan',
            'perusahaan' => PerusahaanModel::all(),
        ];
        return view('admin_perusahaan/perusahaanview', $data);
    }

    public function addform()
    {
        $data = [
            'title' => 'Tambah Data',
            'url' => 'admin/addperusahaan',
        ];
        return view('admin_perusahaan/perusahaanadd', $data);
    }

    public function editform($id)
    {
        if (!$this->PerusahaanModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Update Data',
            'url' => 'admin/updatedetail',
            'perusahaan' => $this->PerusahaanModel->detailData($id),
        ];
        return view('admin_perusahaan/perusahaanedit', $data); 
    }

    public function addaction()
    {
        Request()->validate([
            'nama_perusahaan' => 'required|unique:perusahaan,nama_perusahaan',
            'alamat' => 'required',
            'bidang_jasa' => 'required',
            'deskripsi' => 'required',
            'email' => 'required|unique:perusahaan,email',
            'user_id' => 'required',
            'foto' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ]);
        if (isset(Request()->foto)) {
            $file = Request()->foto;
            $filename = Str::of(Request()->nama_perusahaan)->slug('-').'.'.$file->extension();
            $file->move(public_path('foto_uploaded'), $filename);    
        } else {
            $filename = '';
        }
        $data = [
            'nama_perusahaan' => Request()->nama_perusahaan,
            'alamat' => Request()->alamat,
            'bidang_jasa' => Request()->bidang_jasa,
            'deskripsi' => Request()->deskripsi,
            'email' => Request()->email,
            'user_id' => Request()->user_id,
            'slug' => Str::of(Request()->nama_perusahaan)->slug('-'),
            'foto' => $filename,
        ];
        PerusahaanModel::create($data);
        return redirect('/admin/perusahaan');
    }

    public function editaction($id)
    {
        Request()->validate([
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'bidang_jasa' => 'required',
            'deskripsi' => 'required',
            'user_id' => 'required',
        ]);
        if (isset(Request()->foto)) {
            $file = Request()->foto;
            $filename = Str::of(Request()->nama_perusahaan)->slug('-').'.'.$file->extension();
            $file->move(public_path('foto_uploaded'), $filename);
            $data = [
                'nama_perusahaan' => Request()->nama_perusahaan,
                'alamat' => Request()->alamat,
                'bidang_jasa' => Request()->bidang_jasa,
                'deskripsi' => Request()->deskripsi,
                'email' => Request()->email,
                'user_id' => Request()->user_id,
                'slug' => Str::of(Request()->nama_perusahaan)->slug('-'),
                'foto' => $filename,
            ];
        } else {
            $data = [
                'nama_perusahaan' => Request()->nama_perusahaan,
                'alamat' => Request()->alamat,
                'bidang_jasa' => Request()->bidang_jasa,
                'deskripsi' => Request()->deskripsi,
                'email' => Request()->email,
                'user_id' => Request()->user_id,
                'slug' => Str::of(Request()->nama_perusahaan)->slug('-'),
            ];
        } 
        PerusahaanModel::updateOrCreate(['id' => $id],$data);
        return redirect('/admin/perusahaan');
    }

    public function actiondelete(Request $request)
    {
        $id = $request->input('id');
        $loker = LokerModel::where('perusahaan_id', $id)->exists(); 
        if ($loker) {
            $message = 'Perusahaan Memiliki Lowongan kerja dan prakerin yang aktif. Harap Dihapus Terlebih Dahulu';
        } else {
            $perusahaan = PerusahaanModel::find($id);
            $perusahaan->delete(); 
            $message = 'Berhasil dihapus';

        }
        return redirect('/admin/perusahaan')->with('message', $message);
    }
}
