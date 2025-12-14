<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Helper
{

    public static function uploadImage($photo, $folder = 'photos')
    {
        if ($photo) {
            $fileName       = Helper::renameFile($photo->getClientOriginalName());
            /*** Public Folder Upload */
            $folder_path    = 'uploads/' . $folder;
            $photo_path     = $folder_path . '/' . $fileName;
            $photo_stored   = $photo->move($folder_path, $fileName);

            /*** Storage Folder Upload */
            // $photo_path     = 'storage/'. $folder. '/'. $fileName;
            // $photo_stored   = $photo->storeAs($folder, $fileName, 'public');
            if ($photo_stored) {
                return [
                    'status' => true,
                    'name' => $photo_path,
                ];
            }
        }
        return [
            'status' => false,
            'name' => '',
        ];
    }

    public static function renameFile($full_filename = '')
    {
        $filename = Str::lower(Str::random(32)) . ".jpg";
        if ($full_filename) {
            $exploded_name  = explode('.', $full_filename);
            $filename       = Str::lower(Str::random(32)) . "." . end($exploded_name);
        }
        return $filename;
    }

    public static function unlinkImage($photo_name)
    {
        if (file_exists(public_path($photo_name))) {
            unlink(public_path($photo_name));
            // unlink(asset($photo_name));
        }
    }

    public static function unlinkFile($filename)
    {
        if (file_exists(public_path($filename))) {
            unlink(public_path($filename));
        }
    }

    public static function copyImage($photo, $folder)
    {
        if (!$photo || !file_exists(public_path($photo))) {
            return [
                'status' => false,
                'name' => NULL,
            ];
        }

        $path_info      = pathinfo(public_path($photo));

        $source_path = $path_info['dirname'] . '/' . $path_info['basename'];

        $fileName       = date("Y-m-d-H-i-s-") . substr(microtime(FALSE), 2, 8);
        $folder_path    = public_path('uploads/' . $folder);
        $photo_path     = $folder_path . '/' . $fileName . '.' . $path_info['extension'];
        $store_as       = 'uploads/' . $folder . '/' . $fileName . '.' . $path_info['extension'];

        if (!File::exists($folder_path)) {
            File::makeDirectory($folder_path, 0755, true);
        }

        $photo_copied = File::copy($source_path, $photo_path);

        if ($photo_copied) {
            return [
                'status' => true,
                'name' => $store_as,
            ];
        }
    }

}
