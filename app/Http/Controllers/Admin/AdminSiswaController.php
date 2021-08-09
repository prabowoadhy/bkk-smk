<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class AdminSiswaController extends Controller
{

    public function __construct()
    {
        $this->SiswaModel = new Siswa();
    }

    public function index(Request $request) 
    {
        $data = [
            'title' => 'Data Siswa',
            'url' => 'admin/siswa',
            'siswa' => $this->SiswaModel->allData(),
        ];
        return view('admin_siswa/siswaview', $data);
    }
    
    public function addSiswa()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'url' => 'admin/addsiswa',
        ];
        return view('admin_siswa/siswaadd', $data);
    }

    public function editSiswa($id_siswa)
    {
        if (!$this->SiswaModel->detailData($id_siswa)) {
            abort(404);
        }
        $data = [
            'title' => 'Update Data Siswa',
            'url' => 'admin/updatedetail',
            'siswa' => $this->SiswaModel->detailData($id_siswa),
        ];
        return view('admin_siswa/siswaedit', $data); 
    }

    public function insert()
    {
        Request()->validate([
            'nis' => 'required|unique:siswa,nis|max:255',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:siswa,email|unique:alumni,email',
            'password' => 'required',
        ]);
        $data = [
            'nis' => Request()->nis,
            'nama' => Request()->nama,
            'tempat_lahir' => Request()->tempat_lahir,
            'tgl_lahir' => Request()->tgl_lahir,
            'alamat' => Request()->alamat,
            'email' => Request()->email,
            'password' => bcrypt(Request()->password),
            // 'created_at' => timestamps,
        ];
        $this->SiswaModel->insert($data);
        return redirect('/admin/siswa');
    }

    public function actionUpdate($id_siswa)
    {
        Request()->validate([
            'nis' => 'required|max:255',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);
        $data = [
            'nis' => Request()->nis,
            'nama' => Request()->nama,
            'tempat_lahir' => Request()->tempat_lahir,
            'tgl_lahir' => Request()->tgl_lahir,
            'alamat' => Request()->alamat,
            'email' => Request()->email,
            // 'created_at' => timestamps,
        ];
        $this->SiswaModel->updatesiswa($id_siswa, $data);
        return redirect('/admin/siswa');
    }
}
