<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengurusCabang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pcnu = [
            [
                'id_prov' => 1,
                'kode_kab' => '01',
                'nama_pc' => 'Kabupaten Kediri'
            ],[
                'id_prov' => 1,
                'kode_kab' => '02',
                'nama_pc' => 'Kabupaten Lumajang'
            ],[
                'id_prov' => 1,
                'kode_kab' => '03',
                'nama_pc' => 'Kabupaten Ngawi'
            ],[
                'id_prov' => 1,
                'kode_kab' => '04',
                'nama_pc' => 'Kabupaten Sumenep'
            ],[
                'id_prov' => 2,
                'kode_kab' => '05',
                'nama_pc' => 'Kabupaten Pamekasan'
            ],[
                'id_prov' => 2,
                'kode_kab' => '06',
                'nama_pc' => 'Kabupaten Sampang'
            ],[
                'id_prov' => 2,
                'kode_kab' => '07',
                'nama_pc' => 'Kabupaten Bangkalan'
            ],[
                'id_prov' => 2,
                'kode_kab' => '08',
                'nama_pc' => 'Kabupaten Pasuruan'
            ],[
                'id_prov' => 2,
                'kode_kab' => '09',
                'nama_pc' => 'Kabupaten Probolinggo'
            ],
        ];
        foreach ($pcnu as $row) {
            \App\Models\PengurusCabang::create($row);
        }
    }
}
