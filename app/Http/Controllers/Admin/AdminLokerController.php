<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LokerModel;
use App\Models\LamaranModel;
use App\Models\PerusahaanModel;

class AdminLokerController extends Controller
{

    public function __construct()
    {
        $this->LokerModel = new LokerModel();
        $this->PerusahaanModel = new PerusahaanModel();
        $this->LamaranModel = new LamaranModel();
    }

    public function index(Request $request) {
        $data = [
            'title' => 'Lowongan Kerja',
            'url' => 'admin/loker',
            'loker' => LokerModel::all(),
        ];
        return view('admin_loker/lokerview', $data);
    }

    public function addform()
    {
        $data = [
            'title' => 'Tambah Data',
            'url' => 'admin/addloker',
            'perusahaan' => $this->PerusahaanModel->allData(),
        ];
        return view('admin_loker/lokeradd', $data);
    }

    public function editform($id)
    {
        if (!$this->LokerModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Update Data',
            'url' => 'admin/updatedetail',
            'loker' => $this->LokerModel->detailData($id),
            'perusahaan' => $this->PerusahaanModel->allData(),
        ];
        return view('admin_loker/lokeredit', $data); 
    }

    public function pelamarloker($id_loker)
    {
        
        $data = [
            'title' => 'Update Data',
            'url' => 'admin/pelamar',
            'lamaran' => $this->LamaranModel->pelamarloker($id_loker),
        ];
        return view('admin_loker/pelamarview', $data); 
    }

    public function addaction()
    {
        Request()->validate([
            'jenis_loker' => 'required',
            'posisi' => 'required',
            'bidang' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'penempatan' => 'required',
            'deskripsi' => 'required',
            'perusahaan_id' => 'required',
        ]);
        $data = [
            'jenis_loker' => Request()->jenis_loker,
            'posisi' => Request()->posisi,
            'bidang' => Request()->bidang,
            'tgl_mulai' => Request()->tgl_mulai,
            'tgl_selesai' => Request()->tgl_selesai,
            'penempatan' => Request()->penempatan,
            'deskripsi' => Request()->deskripsi,
            'perusahaan_id' => Request()->perusahaan_id,
            'user_id' => Request()->user_id,
        ];
        $this->LokerModel->insert($data);
        return redirect('/admin/loker');
    }

    public function editaction($id)
    {
        Request()->validate([
            'jenis_loker' => 'required',
            'posisi' => 'required',
            'bidang' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'penempatan' => 'required',
            'deskripsi' => 'required',
            'perusahaan_id' => 'required',
        ]);
        $data = [
            'jenis_loker' => Request()->jenis_loker,
            'posisi' => Request()->posisi,
            'bidang' => Request()->bidang,
            'tgl_mulai' => Request()->tgl_mulai,
            'tgl_selesai' => Request()->tgl_selesai,
            'penempatan' => Request()->penempatan,
            'deskripsi' => Request()->deskripsi,
            'perusahaan_id' => Request()->perusahaan_id,
            'user_id' => Request()->user_id,
        ];
        $this->LokerModel->updateloker($id, $data);
        return redirect('/admin/loker');
    }
    public function actiondelete(Request $request)
    {
        $id = $request->input('id');
        $lamaran = LamaranModel::where('id_loker', $id)->exists(); 
        if ($lamaran) {
            $message = 'Perusahaan Memiliki Lowongan kerja atau prakerin yang aktif. Harap Dihapus Terlebih Dahulu';
        } else {
            $loker = LokerModel::find($id);
            $loker->delete(); 
            $message = 'Berhasil dihapus';

        }
        return redirect('/admin/loker')->with('message', $message);
    }
}
