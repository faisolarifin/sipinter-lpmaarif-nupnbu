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
            ],
            [
                'id_prov' => 1,
                'kode_kab' => '02',
                'kode_kab_kd' => '052801',
                'nama_kab' => 'Kabupaten Lumajang'
            ],
            [
                'id_prov' => 1,
                'kode_kab' => '03',
                'kode_kab_kd' => '052802',
                'nama_kab' => 'Kabupaten Ngawi'
            ],
        ];
        foreach ($kabupaten as $row) {
            \App\Models\Kabupaten::create($row);
        }
    }
}
