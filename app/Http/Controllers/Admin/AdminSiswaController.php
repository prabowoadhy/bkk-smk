<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

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
            'foto' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ]);
        if (isset(Request()->foto)) {
            $file = Request()->foto;
            $filename = 'siswa_'.Request()->nis.'.'.$file->extension();
            $file->move(public_path('foto_uploaded'), $filename);    
        } else {
            $filename = '';
        }
        $data = [
            'nis' => Request()->nis,
            'nama' => Request()->nama,
            'tempat_lahir' => Request()->tempat_lahir,
            'tgl_lahir' => Request()->tgl_lahir,
            'alamat' => Request()->alamat,
            'email' => Request()->email,
            'password' => bcrypt(Request()->password),
            'foto' => $filename,
        ];
        $this->SiswaModel->insert($data);
        return redirect('/admin/siswa')->with('message', 'Data '.Request()->nama.' Berhasil Ditambahkan !');
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
        if (isset(Request()->foto)) {
            $file = Request()->foto;
            $filename = 'siswa_'.Request()->nis.'.'.$file->extension();
            $file->move(public_path('foto_uploaded'), $filename);    
            $data = [
                'nis' => Request()->nis,
                'nama' => Request()->nama,
                'tempat_lahir' => Request()->tempat_lahir,
                'tgl_lahir' => Request()->tgl_lahir,
                'alamat' => Request()->alamat,
                'email' => Request()->email,
                'foto' => $filename,
            ];
        } else {
            $data = [
                'nis' => Request()->nis,
                'nama' => Request()->nama,
                'tempat_lahir' => Request()->tempat_lahir,
                'tgl_lahir' => Request()->tgl_lahir,
                'alamat' => Request()->alamat,
                'email' => Request()->email,
            ];
        }
        $this->SiswaModel->updatesiswa($id_siswa, $data);
        return redirect('/admin/siswa')->with('message', 'Data '.Request()->nama.' Berhasil Diubah !');
    }
    
    public function actionDelete(Request $request)
    {
        $id = $request->input('id_siswa');
        $siswa = Siswa::find($id);
        $siswa->delete(); 
        return redirect('/admin/siswa')->with('message', 'Data '.Request()->nama.' Berhasil Dihapus !');
    }
}
