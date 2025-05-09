<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function getFiles()
    {
        // Get all files from the 'uploads' folder on S3 (or local disk)
        $files = Storage::disk('s3')->files('uploads');

        $videos = [];
        $images = [];

        // Loop through all files and categorize them
        foreach ($files as $file) {
            if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['mp4', 'mov', 'avi', 'webm'])) {
                // If the file is a video, add it to the $videos array
                $videos[] = Storage::disk('s3')->url($file);
            } elseif (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])) {
                // If the file is an image, add it to the $images array
                $images[] = Storage::disk('s3')->url($file);
            }
        }

        // Return the videos and images URLs as JSON
        return response()->json([
            'videos' => $videos,
            'images' => $images,
        ]);
    }
}
