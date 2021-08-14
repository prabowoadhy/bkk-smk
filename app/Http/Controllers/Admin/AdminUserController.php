<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(Request $request) {
        $data = [
            'title' => 'Data Pengguna',
            'url' => 'admin/user',
            'user' => User::all(),
        ];
        return view('admin_user/userview', $data);
    }

    public function addform()
    {
        $data = [
            'title' => 'Tambah Data Pengguna',
            'url' => 'admin/adduser',
        ];
        return view('admin_user/useradd', $data);
    }

    public function editform($id)
    {
        if (!User::find($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Update Data Pengguna',
            'url' => 'admin/updatedetail',
            'user' => User::find($id),
        ];
        return view('admin_user/useredit', $data); 
    }

    public function addaction()
    {
        Request()->validate([
            'name' => 'required',
            'level' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);
        $data = [
            'name' => Request()->name,
            'email' => Request()->email,
            'level' => Request()->level,
            'password' => Hash::make(Request()->password),
        ];
        User::create($data);
        return redirect('/admin/user');
    }

    public function editaction($id)
    {
        Request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        if (isset(Request()->password)) { 
            $data = [
                'name' => Request()->name,
                'email' => Request()->email,
                'level' => Request()->level,
                'password' => Hash::make(Request()->password),
            ];
        } else {
            $data = [
                'name' => Request()->name,
                'email' => Request()->email,
                'level' => Request()->level,
            ];
        }
        User::updateOrCreate(['id' => $id], $data);
        return redirect('/admin/user');
    }

    public function actiondelete(Request $request)
    {
        $id = $request->input('id');
        $siswa = User::find($id);
        $siswa->delete(); 
        return redirect('/admin/user')->with('message', 'Data '.Request()->nama.' Berhasil Dihapus !');
    }
}
