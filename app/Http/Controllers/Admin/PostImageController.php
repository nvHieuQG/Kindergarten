<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostImageController extends Controller
{
    public function upload(Request $request)
    {
        try {
            if ($request->hasFile('upload')) {
                // Ensure directory exists
                if (!file_exists(public_path('media'))) {
                    mkdir(public_path('media'), 0755, true);
                }

                $file = $request->file('upload');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;

                $file->move(public_path('media'), $fileName);

                $url = asset('media/' . $fileName);

                return response()->json([
                    'uploaded' => true,
                    'url' => $url
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'uploaded' => false,
                'error' => [
                    'message' => 'Could not upload image: ' . $e->getMessage()
                ]
            ], 500);
        }

        return response()->json([
            'uploaded' => false,
            'error' => [
                'message' => 'No file uploaded.'
            ]
        ], 400);
    }
}
