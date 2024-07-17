<?php

namespace Database\Seeders;

use App\Models\ContentManagement\ContentDetail;
use App\Models\ContentManagement\ContentMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Homepage
        ContentMaster::create([
            'id' => 'DSXY2NUCFO6TQ0J3H4PAG',
            'code' => 'homepage',
            'name' => 'Homepage',
            'description' => 'Management tentang halaman utama digunakan untuk mengatur isi konten yang berada pada halaman utama website Boemisora'
        ]);
        $contentDetailsHomepage = [
            [
                'id' => '9PVUEWS3PUF050IZ74PZI',
                'code' => 'homepage-banner',
                'name' => 'Homepage Banner'
            ],
            [
                'id' => 'FPT6TK9132YFO2517E461',
                'code' => 'homepage-header-title',
                'name' => 'Header - Title'
            ],
            [
                'id' => 'NX0XATUUXZQ5DQBIC5UOK',
                'code' => 'homepage-header-image',
                'name' => 'Header - Image'
            ],
            [
                'id' => 'PD84ORHIXYL6MFK8KLCGD',
                'code' => 'homepage-header-subtitle',
                'name' => 'Header - Subtitle'
            ],
            [
                'id' => 'QOS4YV1I9TGHTSNPJX8L6',
                'code' => 'homepage-header-logo',
                'name' => 'Header - Logo'
            ],
            [
                'id' => 'ZL3H8L8SMTOATYS6TUWSW',
                'code' => 'homepage-header-cta',
                'name' => 'Header - Read Our Full Story'
            ]
        ];

        foreach ($contentDetailsHomepage as $detailHomepage) {
            ContentDetail::create([
                'id' => $detailHomepage['id'],
                'id_master' => 'DSXY2NUCFO6TQ0J3H4PAG',
                'type' => 'undefined',
                'name' => $detailHomepage['name'],
                'code' => $detailHomepage['code'],
                'class' => null,
                'content_id' => null,
                'content_en' => null,
                'sequence' => null,
                'description' => null,
                'style' => null,
                'image' => null,
                'link_title' => null,
                'link_url' => null,
                'is_active' => 'yes',
                'created_by' => '[]',
                'updated_by' => '[]',
                'created_at' => null,
                'updated_at' => null,
            ]);
        }
    }
}
