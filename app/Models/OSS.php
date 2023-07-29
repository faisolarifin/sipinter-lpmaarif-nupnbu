<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OSS extends Model
{
    use HasFactory;
    protected $table = 'oss';
    protected $primaryKey = 'id_oss';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'id_user',
        'kode_unik',
        'bukti_bayar',
        'tanggal',
        'tgl_izin',
        'tgl_expired',
        'status',
    ];
    public function satpen()
    {
        return $this->belongsTo(Satpen::class, 'id_user', 'id_user');
    }
    public function ossstatus()
    {
        return $this->hasMany(OSSStatus::class, 'id_oss');
    }
}
