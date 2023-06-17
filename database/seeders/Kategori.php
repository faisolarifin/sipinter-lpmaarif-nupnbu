<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Kategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'nm_kategori' => 'A',
                'konotasi' => 'A',
                'keterangan' => "yayasan bhpnu dan tanah milik nu (jami'yah)"
            ],
            [
                'nm_kategori' => 'B',
                'konotasi' => 'B',
                'keterangan' => "yayasan bhpnu dan tanah milik masyarakat nu"
            ],
            [
                'nm_kategori' => 'C',
                'konotasi' => 'C',
                'keterangan' => "yayasan non bhpnu dan tanah milik nu (jam'iyah)"
            ],
            [
                'nm_kategori' => 'D',
                'konotasi' => 'D',
                'keterangan' => "yayasan non bhpnu dan tanah milik masyarakat nu"
            ],
        ];
        foreach ($kategori as $row) {
            \App\Models\Kategori::create($row);
        }
    }
}
