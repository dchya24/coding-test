<?php

namespace App\Service;

class ImageService {
    /**
     * Upload Image
     */
    public static function upload($image, $folder, $preName)
    {
        $filename = $preName . time() .'.'. $image->extension();

        $result = $image->move(public_path($folder), $filename);

        return ["filename" => $filename, "result" => $result];
    }

    public static function delete($path){
        return unlink($path);
    }
}
