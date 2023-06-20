<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Kabupaten extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kabupaten = [
            [
                'id_prov' => 1,
                'kode_kab' => '01',
                'kode_kab_kd' => '052800',
                'nama_kab' => 'Kabupaten Kediri'
            ],[
                'id_prov' => 1,
                'kode_kab' => '02',
                'kode_kab_kd' => '052801',
                'nama_kab' => 'Kabupaten Lumajang'
            ],[
                'id_prov' => 1,
                'kode_kab' => '03',
                'kode_kab_kd' => '052802',
                'nama_kab' => 'Kabupaten Ngawi'
            ],[
                'id_prov' => 1,
                'kode_kab' => '04',
                'kode_kab_kd' => '052800',
                'nama_kab' => 'Kabupaten Sumenep'
            ],[
                'id_prov' => 2,
                'kode_kab' => '05',
                'kode_kab_kd' => '052801',
                'nama_kab' => 'Kabupaten Pamekasan'
            ],[
                'id_prov' => 2,
                'kode_kab' => '06',
                'kode_kab_kd' => '052802',
                'nama_kab' => 'Kabupaten Sampang'
            ],[
                'id_prov' => 2,
                'kode_kab' => '07',
                'kode_kab_kd' => '052803',
                'nama_kab' => 'Kabupaten Bangkalan'
            ],[
                'id_prov' => 2,
                'kode_kab' => '08',
                'kode_kab_kd' => '052804',
                'nama_kab' => 'Kabupaten Pasuruan'
            ],[
                'id_prov' => 2,
                'kode_kab' => '09',
                'kode_kab_kd' => '052805',
                'nama_kab' => 'Kabupaten Probolinggo'
            ],
        ];
        foreach ($kabupaten as $row) {
            \App\Models\Kabupaten::create($row);
        }
    }
}
