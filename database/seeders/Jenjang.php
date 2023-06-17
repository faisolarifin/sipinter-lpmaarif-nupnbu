<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jenjang as JenjangModel;

class Jenjang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenjang = [
            'PAUD',
            'KB',
            'TPQ',
            'RA',
            'TK',
            'SD',
            'MI',
            'SMP',
            'MTS',
            'SMA',
            'SMK',
            'MA',
            'MADRASAH DINIYAH',
            'SLB',
            'PERGURUAN TINGGI'
        ];

        foreach ($jenjang as $row) {
            JenjangModel::create(['nm_jenjang' => $row]);
        }
    }
}
