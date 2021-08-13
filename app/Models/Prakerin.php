<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prakerin extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'jenis_prakerin',
        'posisi',
        'bidang',
        'tgl_mulai',
        'tgl_selesai',
        'penempatan',
        'deskripsi',
        'slug',
        'perusahaan_id',
        'user_id',
    ];

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('slug', 'like', '%' . $search . '%')
            ->orWhere('deskripsi', 'like', '%' . $search . '%');
        });
    }
    
    public function perusahaan()
    {
        return $this->belongsTo(PerusahaanModel::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lamaranprakerin()
    {
        return $this->hasMany(LamaranPrakerin::class, 'id_prakerin');
    }
}
