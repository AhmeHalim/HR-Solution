<?php

namespace App\Helpers;
use File;
use Image;

class Helper
{
    public static function cssFilesPath(string $string){
        return url('resources/assets/front/css/'.$string);
    }

    public static function jsFilesPath(string $string){
        return url('resources/assets/front/js/'.$string);
    }

    public static function imageFilesPath(string $string){
        return url('resources/assets/front/images/'.$string);
    }

    public static function uploadedImagesPath($model,$image){
        return url('uploads/'.$model.'/'.$image);
    }


    public static function uploadImage($model,$image){
        if ($image) {
            $mime = File::mimeType($image);
            $mimearr = explode('/', $mime);
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path("uploads/$model/$fileName");
            Image::make($image->getRealPath())->save($path);   
            return $fileName; 
        }else{
            return NULL;
        }
    } 

    public static function updateUploadedImage($model,$image,$oldImage){
        if ($image) {
            ///////remove the old image///////
            if ($oldImage != null) {
                $img_path = base_path() . "/uploads/$model";
                unlink(sprintf($img_path . '%s', $oldImage));
            }

            $mime = File::mimeType($image);
            $mimearr = explode('/', $mime);
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path("uploads/$model/$fileName");
            Image::make($image->getRealPath())->save($path);    
            return $fileName;
        }
    } 

    public static function uploadFile($model,$file){
        if ($file) {
            $mime = File::mimeType($file);
            $mimearr = explode('/', $mime);
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path("uploads/$model/files/");
            $file->move( $path, $fileName );
            return $fileName;
        }else{
            return NULL;
        }
    } 


    public static function updateUploadFile($model,$file,$oldFile){
        if ($file) {
            ///////remove the old image///////
            if ($oldFile != null) {
                $path = base_path() . "/uploads/$model/files";
                unlink(sprintf($path . '%s', $oldFile));
            }

            $mime = File::mimeType($image);
            $mimearr = explode('/', $mime);
            $extension = $mimearr[1]; // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = base_path("uploads/$model/files/");
            $file->move( $path, $fileName ); 
            return $fileName;  
        }
    } 
    

}