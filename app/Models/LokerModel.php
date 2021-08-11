<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LokerModel extends Model
{
    use HasFactory;

    protected $table = "loker";
    protected $primaryKey = "id";
    protected $fillable = [
        'jenis_loker',
        'posisi',
        'bidang',
        'tgl_mulai',
        'gtl_selesai',
        'penempatan',
        'deskripsi',
        'perusahaan_id',
        'user_id',
    ];

    public function allData() {
        $loker = DB::table('loker')
            ->leftJoin('perusahaan', 'loker.perusahaan_id', '=', 'perusahaan.id')
            ->select('loker.*', 'perusahaan.nama_perusahaan', 'perusahaan.email')
            ->get();
        return $loker;
    }

    public function detailData($id) {
        return DB::table('loker')->where('id', $id)->first();
    }

    public function insert($data)
    {
        DB::table('loker')->insert($data);
    }

    public function updateloker($id, $data)
    {
        DB::table('loker')->where('id', $id)->update($data);
    }
}
