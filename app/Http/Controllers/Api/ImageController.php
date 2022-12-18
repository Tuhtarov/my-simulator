<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $result = ['success' => false];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();

            try {
                $file->move('images', $filename);
                $info = getimagesize(public_path() . '/images/' . $filename);
                $baseName = pathinfo(public_path() . '/images/' . $filename, PATHINFO_FILENAME);

                return new ImageResource(Image::create([
                    'name' => $baseName,
                    'ext' => $ext,
                    'width' => $info[0],
                    'height' => $info[1]
                ]));

            } catch (\Exception $e) {
                $result['error'] = $e->getMessage();
            }
        }

        return response()->json($result);
    }

    public function index()
    {
        return ImageResource::collection(Image::all());
    }
}
