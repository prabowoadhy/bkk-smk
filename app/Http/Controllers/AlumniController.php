<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\LamaranModel;
use App\Models\Siswa;

class AlumniController extends Controller
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
            'title' => 'Dashboard Alumni',
            'active' => 'Dashboard Alumni',
            'url' => 'alumni-profil',
            'user' => $this->userlog(),
        ];
        return view('siswa/siswa-profil', $data);
    }

    public function alumniprofil(Request $request) {

        // $siswa = $this->userlog();
        $data = [
            'title' => 'Lamaran Pekerjaan Alumni',
            'active' => 'Lamaran Pekerjaan Alumni',
            'url' => 'alumni-profil',
            'user' => $this->userlog(),
            'siswa' => Siswa::find(Auth::guard('alumni')->user()->id),
        ];
        return view('siswa/siswa-profil', $data);
    }

    public function alumniloker(Request $request) {
        $data = [
            'title' => 'Lamaran Pekerjaan Alumni',
            'active' => 'Lamaran Pekerjaan Alumni',
            'url' => 'alumni-loker',
            'user' => $this->userlog(),
            'lamaran' => LamaranModel::where('id_pelamar', Auth::guard('alumni')->user()->id)->orderByDesc('created_at')->get(),
            // 'lamaran' => $this->LamaranModel->siswaloker(Auth::guard('siswa')->user()->id),
        ];
        // return dd(LamaranModel::all()->where('id_pelamar', Auth::guard('alumni')->user()->id)->get());
        return view('siswa/siswa-loker', $data);
    }

    public function siswaregistrasi(Request $request) {
        $data = [
            'title' => 'Registrasi Siswa',
            'active' => 'Registrasi Siswa',
            'url' => 'siswa-registrasi'
        ];
        return view('auth/siswa-registrasi', $data);
    }

    public function alumnilogin(Request $request) {
        $data = [
            'title' => 'Login Alumni',
            'active' => 'Login Alumni',
            'url' => 'alumni-login'
        ];
        return view('auth/alumni-login', $data);
    }

    public function alumnilamaraction()
    {
        Request()->validate([
            'id_loker' => 'required',
            'id_pelamar' => 'required',
        ]);
        $data = [
            'id_loker' => Request()->id_loker,
            'id_pelamar' => Request()->id_pelamar,
            'catatan_pelamar' => Request()->catatan_pelamar,
        ];
        LamaranModel::create($data);
        return redirect('/alumni-loker');
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
