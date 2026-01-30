<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostImageController extends Controller
{
    /**
     * Upload image for CKEditor
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        try {
            // Validate the upload
            $request->validate([
                'upload' => [
                    'required',
                    'image',
                    'mimes:jpeg,jpg,png,gif,webp',
                    'max:2048', // 2MB max
                ],
            ], [
                'upload.required' => 'Vui lòng chọn ảnh để tải lên.',
                'upload.image' => 'File phải là ảnh.',
                'upload.mimes' => 'Chỉ chấp nhận ảnh định dạng: JPG, PNG, GIF, WEBP.',
                'upload.max' => 'Kích thước ảnh không được vượt quá 2MB.',
            ]);

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                
                // Get original filename info
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                
                // Create safe filename
                $fileName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
                $fileName = $fileName . '_' . time() . '.' . $extension;

                // Store in storage/app/public/posts/images
                $path = $file->storeAs('posts/images', $fileName, 'public');

                // Get URL
                $url = asset('storage/' . $path);

                // Log successful upload
                Log::info('Post image uploaded', [
                    'filename' => $fileName,
                    'size' => $file->getSize(),
                    'user_id' => Auth::id(),
                ]);

                return response()->json([
                    'uploaded' => true,
                    'url' => $url,
                    'fileName' => $fileName,
                ]);
            }

            return response()->json([
                'uploaded' => false,
                'error' => [
                    'message' => 'Không tìm thấy file để tải lên.'
                ]
            ], 400);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'uploaded' => false,
                'error' => [
                    'message' => $e->validator->errors()->first('upload')
                ]
            ], 422);
        } catch (\Exception $e) {
            Log::error('Post image upload failed', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
            ]);

            return response()->json([
                'uploaded' => false,
                'error' => [
                    'message' => 'Không thể tải ảnh lên. Vui lòng thử lại.'
                ]
            ], 500);
        }
    }
}
