<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamaranPrakerin extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_prakerin',
        'id_pelamar',
        'catatan_pelamar',
        'catatan_perusahaan',
        'status',
    ];

    protected $guarded = [];
    
    public function prakerin()
    {
        return $this->belongsTo(Prakerin::class, 'id_prakerin');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_pelamar');
    }
}
