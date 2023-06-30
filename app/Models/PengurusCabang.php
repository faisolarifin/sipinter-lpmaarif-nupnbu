<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusCabang extends Model
{
    use HasFactory;
    protected $table = 'pengurus_cabang';
    protected $primaryKey = 'id_pc';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'id_prov',
        'kode_kab',
        'nama_pc',
    ];
    public function prov()
    {
        return $this->belongsTo(Provinsi::class, 'id_prov');
    }
}
