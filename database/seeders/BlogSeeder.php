<?php

namespace Database\Seeders;

use App\Helpers\GeneralHelper;
use App\Models\MasterData\CategoryBlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { // Sample data to be inserted
        $data = [
            [
                'name' => 'Technology',
                'created_by' => json_encode(['user_id' => 1, 'name' => 'Admin']),
                'updated_by' => json_encode(['user_id' => 1, 'name' => 'Admin']),
            ],
            [
                'name' => 'Lifestyle',
                'created_by' => json_encode(['user_id' => 1, 'name' => 'Admin']),
                'updated_by' => json_encode(['user_id' => 1, 'name' => 'Admin']),
            ],
            [
                'name' => 'Travel',
                'created_by' => json_encode(['user_id' => 1, 'name' => 'Admin']),
                'updated_by' => json_encode(['user_id' => 1, 'name' => 'Admin']),
            ],
        ];

        // Insert data into the database
        foreach ($data as $item) {
            CategoryBlog::updateOrCreate(
                ['id' => GeneralHelper::generateNanoId()],
                $item
            );
        }
    }
}
