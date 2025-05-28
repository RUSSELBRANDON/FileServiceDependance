<?php

namespace Russel\FileUpload;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Russel\FileUpload\Enums\FilePath;

class FileUploadService
{
    public function uploadFile(UploadedFile $file, FilePath $path): string
    {
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $uniqueFileName = $originalFileName . '_' . time() . '_' . uniqid() . '.' . $extension;
        $storagePath = $path->getStoragePath();
        $finalPath = $file->storeAs($storagePath, $uniqueFileName, 'public');
        return Storage::url($finalPath);
    }

    public function deleteFile(string $path): bool
    {
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }
        return false;
    }
}