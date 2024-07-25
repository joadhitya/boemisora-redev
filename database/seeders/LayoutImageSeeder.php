<?php

namespace Database\Seeders;

use App\Models\ContentManagement\LayoutImage;
use App\Models\ContentManagement\LayoutMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LayoutImageSeeder extends Seeder
{
    public function run(): void
    {
        $idMaster = Str::random(21);

        LayoutMaster::create([
            'id' => $idMaster,
            'code' => 'homepage',
            'name' => 'Homepage',
            'number_of_image' => 6,
            'style_css' => '
                .masonry {
                    column-count: 3;
                    column-gap: 1rem;
                }

                .masonry-item {
                    position: relative;
                    /* Ensure the positioning context for the overlay */
                    background-color: #f2f2f2;
                    margin-bottom: 1rem;
                    display: inline-block;
                    width: 100%;
                    break-inside: avoid;
                }

                .masonry-item img {
                    width: 100%;
                    height: auto;
                    display: block;
                }

                .image-number {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background-color: rgba(0, 0, 0, 0.6);
                    /* Semi-transparent background */
                    color: white;
                    padding: 0.5rem;
                    border-radius: 0.3rem;
                    font-size: 1.5rem;
                    text-align: center;
                    visibility: hidden;
                    /* Hide the number by default */
                    opacity: 0;
                    transition: opacity 0.3s ease;
                    /* Smooth transition */
                }

                .masonry-item:hover .image-number {
                    visibility: visible;
                    /* Show the number on hover */
                    opacity: 1;
                    cursor: pointer;
                }',
        ]);

        $images = [
            [
                'sequence' => 1,
                'name' => 'Gambar 1',
                'height' => 300,
                'width' => 400,
                'type' => 'HORIZONTAL',
                'image' => 'image1.jpg',
            ],
            [
                'sequence' => 2,
                'name' => 'Gambar 2',
                'height' => 500,
                'width' => 400,
                'type' => 'VERTIKAL',
                'image' => 'image2.jpg',
            ],
            [
                'sequence' => 3,
                'name' => 'Gambar 3',
                'height' => 600,
                'width' => 400,
                'type' => 'HORIZONTAL',
                'image' => 'image2.jpg',
            ],
        ];

        // foreach ($images as $image) {
        //     LayoutImage::create(array_merge([
        //         'id' => Str::random(21),
        //         'id_master' => $idMaster,
        //         'created_by' => json_encode(['user_id' => 1, 'name' => 'Admin']),
        //         'updated_by' => json_encode(['user_id' => 1, 'name' => 'Admin']),
        //     ], $image));
        // }
    }
}
