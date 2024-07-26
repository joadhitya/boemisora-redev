<?php

namespace Database\Seeders;

use App\Helpers\GeneralHelper;
use App\Models\MasterData\WhatToDo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {
        $whatToDo = [
            [
                'name' => 'Fun',
                'image' => 'image1.png'
            ],
            [
                'name' => 'Thrill',
                'image' => 'image2.png'
            ],
            [
                'name' => 'Chill',
                'image' => 'image3.png'
            ]
        ];

        foreach ($whatToDo as $wtd) {
            WhatToDo::create(array_merge([
                'id' => GeneralHelper::generateNanoId(),
                'created_by' => json_encode(['user_id' => 1, 'name' => 'Admin']),
                'updated_by' => json_encode(['user_id' => 1, 'name' => 'Admin']),
            ], $wtd));
        }
    }
}
