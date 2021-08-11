<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PerusahaanModel extends Model
{
    use HasFactory;
    protected $table = "perusahaan";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'bidang_jasa',
        'deskripsi',
        'email',
        'user_id',
        'slug',
        'foto',
    ];

    public function allData() {
        $perusahaan = DB::table('perusahaan')
        ->leftJoin('users', 'perusahaan.user_id', '=', 'users.id')
        ->select('perusahaan.*', 'users.name')
        ->get();
        return $perusahaan;
    }

    public function detailData($id) {
        return DB::table('perusahaan')->where('id', $id)->first();
    }

    public function insert($data)
    {
        DB::table('perusahaan')->insert($data);
    }

    public function updateperusahaan($id, $data)
    {
        DB::table('perusahaan')->where('id', $id)->update($data);
    }
}
