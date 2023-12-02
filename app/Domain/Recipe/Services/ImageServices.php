<?php

namespace App\Domain\Recipe\Services;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageServices
{
    public function uploads($file, $path)
    {
        if ($file) {

            $fileName = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            $filePath = $path . $fileName;

            return $file = [
                'fileName' => $file_name,
                'fileType' => $file_type,
                'filePath' => $filePath,
                'fileSize' => $this->fileSize($file)
            ];
        }
    }

    public function fileSize($file, $precision = 2)
    {
        $size = $file->getSize();

        if ($size > 0) {
            $size = (int)$size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }

        return $size;
    }

    public function obtainFileInputValue($image, $path = null): float|int|string
    {
        if (is_numeric($image) || !filter_var($image, FILTER_VALIDATE_URL) === false) {
            return $image;
        }

        dd($image);

        return $this->upload($image, $path);
    }

    public function upload(UploadedFile $file, string $fileName = null): string
    {
        if (!$fileName) {
            $fileName = md5(Str::random()) . "-recipe-header.{$file->getClientOriginalExtension()}";
        }

        try {
            $tmp = File::get('public/images/' . $fileName);

            if ($tmp) {
                $this->delete($fileName);
            }
        } catch (Exception $e) {
        }

        $file->storeAs('public/images', $fileName);

        return $fileName;
    }

    public function delete(string $fileName): void
    {
        Storage::delete('public/images/' . $fileName);
    }
}
