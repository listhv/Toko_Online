<?php

namespace App\Helpers;
 
class ImageHelper
{
    public static function uploadAndResize(
        $file,
        $directory,
        $fileName,
        $width = null,
        $height = null
    ) {
        $destinationPath = public_path($directory);
        $extension = strtolower($file-> getClientOriginalExtension());
        $image = null;
        // tentukan metode pembuatan gambar berdasarkan ekstensi file
        switch ($extension) {
            case 'jepg':
            case 'jpg' :
                $image = imagecreatefromjpeg($file->getRealPath());
                break;
            case 'png' :
                $image = imagecreatefrompng($file->getRealPath());
                break;
            case 'gif' :
                $image = imagecreatefromgif($file->getRealPath());
                break;
            default:
             throw new \Exception('Unsuported image type');
        }

        // resize gambaar jika lebar diset
        if ($width) {
            $oldWidth = imagesx($image);
            $oldHeight = imagesy($image);
            $aspectRatio = $oldWidth / $oldHeight;
            if (!$height) {
                $height = $width / $aspectRatio;  //hitung tinggi dengan mempertahankan aspek ratio
            }
            $newImage = imagecreatetruecolor($width,$height);
            imagecopyresampled(
                $newImage,
                $image,
                0,
                0,
                0,
                0,
                $width,
                $height,
                $oldWidth,
                $oldHeight
            );
            imagedestroy($image);
            $image = $newImage;
        }
        // simpan gambar dengan kualitas asli
        switch ($extension) {
            case 'jepg':
            case 'jpg' :
                imagejpeg($image, $destinationPath . '/' . $fileName); 
                break;
            case 'png' :
                imagepng($image, $destinationPath . '/' . $fileName); 
                break;
            case 'gif' :
                imagegif($image, $destinationPath . '/' . $fileName); 
                break;
    }
    imagedestroy($image);
    return $fileName;
  }
}
