<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\LamaranModel;
use App\Models\LamaranPrakerin;
use App\Models\Prakerin;
use App\Models\Siswa;

class SiswaController extends Controller
{
    
    public function __construct()
    {
        $this->LamaranModel = new LamaranModel();
        $this->SiswaModel = new Siswa();
    }

    // protected $siswa;
    public function userlog(){
        if (Auth::guard('alumni')->user()) {
            $siswa = Auth::guard('alumni')->user();
        } elseif (Auth::guard('siswa')->user()) {
            $siswa = Auth::guard('siswa')->user();
        }
        return $siswa;
    }

    public function index(Request $request) {
        $data = [
            'title' => 'Dashboard Siswa',
            'active' => 'Dashboard Siswa',
            'url' => 'siswa-profil',
            'user' => $this->userlog(),
        ];
        return view('siswa/siswa-profil', $data);
    }

    public function siswaprofil(Request $request) {

        // $siswa = $this->userlog();
        $data = [
            'title' => 'Lamaran Pekerjaan Siswa',
            'active' => 'Lamaran Pekerjaan Siswa',
            'url' => 'siswa-profil',
            'user' => $this->userlog(),
            'siswa' => Siswa::find(Auth::guard('siswa')->user()->id),
        ];
        return view('siswa/siswa-profil', $data);
    }

    public function siswaprakerin(Request $request) {
        $data = [
            'title' => 'Lamaran Prakerin Siswa',
            'active' => 'Lamaran Prakerin Siswa',
            'url' => 'siswa-prakerin',
            'user' => $this->userlog(),
            'prakerin' => LamaranPrakerin::all()->where('id_pelamar', $this->userlog()->id),
        ];
// return dd($data);
        return view('siswa/siswa-prakerin', $data);
    }

    public function siswaregistrasi(Request $request) {
        $data = [
            'title' => 'Registrasi Siswa',
            'active' => 'Registrasi Siswa',
            'url' => 'siswa-registrasi'
        ];
        return view('auth/siswa-registrasi', $data);
    }

    public function siswalogin(Request $request) {
        $data = [
            'title' => 'Login Siswa',
            'active' => 'Login Siswa',
            'url' => 'siswa-login'
        ];
        return view('auth/siswa-login', $data);
    }

    public function siswalamaraction()
    {
        Request()->validate([
            'id_prakerin' => 'required',
            'id_pelamar' => 'required',
        ]);
        $data = [
            'id_prakerin' => Request()->id_prakerin,
            'id_pelamar' => Request()->id_pelamar,
            'catatan_pelamar' => Request()->catatan_pelamar,
        ];
        LamaranPrakerin::create($data);
        return redirect('/siswa-prakerin');
    }

    public function actionUpdate($id_siswa)
    {
        Request()->validate([
            'nis' => 'required|max:255',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            // 'email' => 'required',
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
        Siswa::updateOrCreate(['id' => Request()->id],$data);
        // $this->SiswaModel->updatesiswa($id_siswa, $data);
        return redirect('/siswa-profil')->with('message', 'Data '.Request()->nama.' Berhasil Diubah !');
    }

}
