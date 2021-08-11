<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;

class AdminAlumniController extends Controller
{

    public function __construct()
    {
        $this->AlumniModel = new Alumni();
    }

    public function index(Request $request) {
        $data = [
            'title' => 'Data Alumni',
            'url' => 'admin/alumni',
            'alumni' => Alumni::all(),
        ];
        return view('admin_alumni/alumniview', $data);
    }

    public function addform()
    {
        $data = [
            'title' => 'Tambah Data Alumni',
            'url' => 'admin/addalumni',
        ];
        return view('admin_alumni/alumniadd', $data);
    }

    public function editform($id)
    {
        if (!$this->AlumniModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Update Data Alumni',
            'url' => 'admin/updatedetail',
            'alumni' => Alumni::find($id),
        ];
        return view('admin_alumni/alumniedit', $data); 
    }

    public function addaction()
    {
        Request()->validate([
            'nik' => 'required|unique:alumni,nik|max:255',
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
            $filename = 'siswa_'.Request()->nik.'.'.$file->extension();
            $file->move(public_path('foto_uploaded'), $filename);    
        } else {
            $filename = '';
        }
        $data = [
            'nik' => Request()->nik,
            'nama' => Request()->nama,
            'tempat_lahir' => Request()->tempat_lahir,
            'tgl_lahir' => Request()->tgl_lahir,
            'alamat' => Request()->alamat,
            'email' => Request()->email,
            'password' => bcrypt(Request()->password),
            'foto' => $filename,
        ];
        Alumni::create($data);
        return redirect('/admin/alumni');
    }

    public function editaction($id)
    {
        Request()->validate([
            'nik' => 'required|max:255',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);
        if (isset(Request()->foto)) {
            $file = Request()->foto;
            $filename = 'siswa_'.Request()->nik.'.'.$file->extension();
            $file->move(public_path('foto_uploaded'), $filename);    
            $data = [
                'id' => Request()->id,
                'nik' => Request()->nik,
                'nama' => Request()->nama,
                'tempat_lahir' => Request()->tempat_lahir,
                'tgl_lahir' => Request()->tgl_lahir,
                'alamat' => Request()->alamat,
                'email' => Request()->email,
                'foto' => $filename,
            ];
        } else {
            $data = [
                'id' => Request()->id,
                'nik' => Request()->nik,
                'nama' => Request()->nama,
                'tempat_lahir' => Request()->tempat_lahir,
                'tgl_lahir' => Request()->tgl_lahir,
                'alamat' => Request()->alamat,
                'email' => Request()->email,
            ];
        }
        Alumni::updateOrCreate(['id' => $id],$data);
        return redirect('/admin/alumni');
    }
}
