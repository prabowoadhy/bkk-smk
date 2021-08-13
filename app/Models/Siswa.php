<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "siswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'nis',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'sekolah_asal',
        'no_telp',
        'email',
        'password',
        'foto',
    ];

    protected $guarded = [];

    public function lamaranprakerin()
    {
        return $this->hasMany(LamaranPrakerin::class, 'id_pelamar', 'id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function allData() {
        return DB::table('siswa')->orderBy('nama', 'asc')->get();
    }

    public function detailData($id) {
        return DB::table('siswa')->where('id', $id)->first();
    }

    public function insert($data)
    {
        DB::table('siswa')->insert($data);
    }

    public function updatesiswa($id, $data)
    {
        DB::table('siswa')->where('id', $id)->update($data);
    }

}
