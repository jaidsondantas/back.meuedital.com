<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class FileController extends Controller
{
    public function postFile(Request $request)
    {
        $fileBase64 = $request->fileBase64;

        if (preg_match('/^data:image\/(\w+);base64,/', $fileBase64)) {
            $data = substr($fileBase64, strpos($fileBase64, ',') + 1);

            $nameImage = 'img' . time() . '.jpg';
            $path = 'img/'.$nameImage;

            Storage::disk('public')->put($path, base64_decode($data));
        }

        return response()->json(['file' => ['name' => 'storage/'.$path]], 200);
    }
}
