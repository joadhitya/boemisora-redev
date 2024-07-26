<?php

namespace App\Helpers;

use Ulid\Ulid;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GeneralHelper
{

    public static function generateNanoId($length = 21): string
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // public static function generateULID(): string
    // {
    //     $currentTime = strtotime('now WIB') * 1000;
    //     $ulid = Ulid::fromTimestamp($currentTime);
    //     return $ulid;
    // }

    public static function getAuthInfo(): string
    {
        $user = Auth::user();
        $informationUser = [
            'id' => $user->id,
            'name' => $user->name
        ];
        return json_encode($informationUser);
    }

    public static function compareData($oldData, $newData)
    {
        $excludedFields = ['created_by', 'updated_by', 'image', 'created_at', 'updated_at'];
        $differences = [];
        if (!is_array($oldData)) {
            $oldData = [];
        }
        if (!is_array($newData)) {
            $newData = [];
        }

        foreach ($oldData as $key => $oldValue) {
            if (in_array($key, $excludedFields)) {
                continue;
            }
            $newValue = $newData[$key] ?? null;
            if ($oldValue != $newValue) {
                $differences[$key] = ['old' => $oldValue, 'new' => $newValue];
            }
        }

        return $differences;
    }


    public static function convertAndCompressImage($inputFile, $outputFile, $quality = 80)
    {
        $file_type = exif_imagetype($inputFile);
        $isPossible = false;

        switch ($file_type) {
            case '2':
                $isPossible = true;
                $baseImage = imagecreatefromjpeg($inputFile);
                break;
            case '3':
                $isPossible = true;
                $baseImage = imagecreatefrompng($inputFile);
                imagepalettetotruecolor($baseImage);
                imagealphablending($baseImage, true);
                imagesavealpha($baseImage, true);
                break;
            case '6':
                $isPossible = true;
                $baseImage = imagecreatefrombmp($inputFile);
                break;
            default:
                break;
        }

        if ($isPossible) {
            $width = imagesx($baseImage);
            $height = imagesy($baseImage);

            $webp = imagecreatetruecolor($width, $height);
            imagecopy($webp, $baseImage, 0, 0, 0, 0, $width, $height);
            imagewebp($webp, $outputFile, $quality);

            File::delete($inputFile);
            imagedestroy($baseImage);
            imagedestroy($webp);
            return true;
        } else {
            return false;
        }
    }

    public static function uploadFile($file, $prefix, $pathTarget)
    {
        $originalPath = $file->getRealPath();
        $originalExtension = $file->getClientOriginalExtension();
        $filename = $prefix . '-' . uniqid() . '.' . $originalExtension;
        $path = public_path('upload/images/what-to-do/');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        if ($originalExtension === 'jpeg' || $originalExtension === 'jpg') {
            $imageResource = imagecreatefromjpeg($originalPath);
            imagejpeg($imageResource, $path . '/' . $filename, 75);
        } elseif ($originalExtension === 'png') {
            $imageResource = imagecreatefrompng($originalPath);
            imagepng($imageResource, $path . '/' . $filename, 6);
        } else {
            throw new \Exception('Unsupported image format');
        }
        imagedestroy($imageResource);
        return $pathTarget . $filename;
    }
}
