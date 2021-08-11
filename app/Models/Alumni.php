<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Alumni extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "alumni";
    protected $primaryKey = "id";

    protected $guarded = [];
    
    protected $fillable = [
        'id',
        'nik',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'email',
        'password',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function allData() {
        return DB::table('alumni')->orderBy('nama', 'desc')->get();
    }

    public function detailData($id) {
        return DB::table('alumni')->where('id', $id)->first();
    }
}
