<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsi';
    protected $primaryKey = 'id_prov';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'kode_prov',
        'kode_prov_kd',
        'nm_prov',
    ];
}
