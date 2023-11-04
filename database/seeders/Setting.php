<?php

namespace Database\Seeders;

use App\Models\Setting as SettingModel;
use Illuminate\Database\Seeder;

class Setting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                "describe" => 'JUMLAH SATPEN PERHALAMAN',
                "lookup" => 'count_perpage',
                "value" => 25,
            ],
            [
                "describe" => 'AWALAN PIAGAM',
                "lookup" => 'prefix_piagam_name',
                "value" => "Piagam Nomor Registrasi Ma'arif - ",
            ],
            [
                "describe" => 'AWALAN SK',
                "lookup" => 'prefix_sk_name',
                "value" => "SK Satuan Pendidikan BHPNU - ",
            ],
            [
                "describe" => 'TEMPLATE PIAGAM',
                "lookup" => 'template_piagam',
                "value" => "Piagam_Template.docx",
            ],
            [
                "describe" => 'TEMPLATE SK',
                "lookup" => 'template_sk',
                "value" => "SK_Template.docx",
            ],

        ];

        foreach ($settings as $row) {
            SettingModel::create($row);
        }
    }
}
