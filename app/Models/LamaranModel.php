<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LamaranModel extends Model
{
    use HasFactory;
    protected $table = "lamaran";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_loker',
        'id_pelamar',
        'catatan_pelamar',
        'catatan_perusahaan',
        'status',
    ];

    protected $guarded = [];
    
    public function loker()
    {
        return $this->belongsTo(LokerModel::class, 'id_loker');
    }

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    public function allData() {
        $lamaran = DB::table('lamaran')
        ->join('loker', 'lamaran.id_loker', '=', 'loker.id')
        ->join('alumni', 'lamaran.id_pelamar', '=', 'alumni.id')
        ->join('perusahaan', 'loker.perusahaan_id', '=', 'perusahaan.id')
        ->select('lamaran.*', 'loker.posisi', 'alumni.nama')
        ->get();
        return $lamaran;
    }
    public function pelamarloker($id_loker) {
        $lamaran = DB::table('lamaran')
        ->join('loker', 'lamaran.id_loker', '=', 'loker.id')
        ->join('alumni', 'lamaran.id_pelamar', '=', 'alumni.id')
        ->join('perusahaan', 'loker.perusahaan_id', '=', 'perusahaan.id')
        ->select('lamaran.*', 'perusahaan.nama_perusahaan', 'loker.posisi', 'alumni.nama', 'alumni.no_telp', 'alumni.email')
        ->where('loker.id', $id_loker)->get();
        return $lamaran;
    }

    public function siswaloker($id_siswa) {
        $lamaran = DB::table('lamaran')
        ->join('loker', 'lamaran.id_loker', '=', 'loker.id')
        ->join('alumni', 'lamaran.id_pelamar', '=', 'alumni.id')
        ->join('perusahaan', 'loker.perusahaan_id', '=', 'perusahaan.id')
        ->select('lamaran.*', 'perusahaan.nama_perusahaan', 'perusahaan.foto', 'loker.posisi', 'alumni.nama', 'alumni.no_telp', 'alumni.email')
        ->where('lamaran.id_pelamar', $id_siswa)->get();
        return $lamaran;
    }

    public function detailData($id) {
        return DB::table('lamaran')->where('id', $id)->first();
    }

    public function insert($data)
    {
        DB::table('lamaran')->insert($data);
    }

    public function updatelamaran($id, $data)
    {
        DB::table('lamaran')->where('id', $id)->update($data);
    }
}
