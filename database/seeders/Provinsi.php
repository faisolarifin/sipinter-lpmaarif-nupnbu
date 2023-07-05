<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Provinsi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinsi = [
            [
                'kode_prov' => '1',
                'kode_prov_kd' => '050000',
                'nm_prov' => 'Jawa Timur'
            ],
            [
                'kode_prov' => '2',
                'kode_prov_kd' => '030000',
                'nm_prov' => 'Jawa Tengah'
            ],
            [
                'kode_prov' => '10',
                'kode_prov_kd' => '020000',
                'nm_prov' => 'Jawa Barat'
            ]
        ];
        foreach ($provinsi as $row) {
            \App\Models\Provinsi::create($row);
        }
    }
}
