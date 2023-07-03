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
        $kabupatens = [
            [
                'id_prov' => 1,
                'kode_kab_kd' => '052800',
                'nama_kab' => 'Kabupaten Sumenep'
            ],[
                'id_prov' => 1,
                'kode_kab_kd' => '052600',
                'nama_kab' => 'Kabupaten Pamekasan'
            ],[
                'id_prov' => 1,
                'kode_kab_kd' => '052700',
                'nama_kab' => 'Kabupaten Sampang'
            ],[
                'id_prov' => 1,
                'kode_kab_kd' => '052900',
                'nama_kab' => 'Kabupaten Bangkalan'
            ],[
                'id_prov' => 2,
                'kode_kab_kd' => '036300',
                'nama_kab' => 'Kota Semarang'
            ],[
                'id_prov' => 2,
                'kode_kab_kd' => '031800',
                'nama_kab' => 'Kabupaten Pati'
            ],[
                'id_prov' => 2,
                'kode_kab_kd' => '030900',
                'nama_kab' => 'Kabupaten Boyolali'
            ],[
                'id_prov' => 3,
                'kode_kab_kd' => '026300',
                'nama_kab' => 'Kabupaten Cirebon'
            ],[
                'id_prov' => 3,
                'kode_kab_kd' => '021400',
                'nama_kab' => 'Kabupaten Ciamis'
            ],[
                'id_prov' => 3,
                'kode_kab_kd' => '021800',
                'nama_kab' => 'Kabupaten Indramayu'
            ],
        ];
        foreach ($kabupatens as $kabupaten) {
            \App\Models\Kabupaten::create($kabupaten);
        }
    }
}
