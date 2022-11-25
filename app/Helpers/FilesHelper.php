<?php

namespace App\Helpers;

use Session;
use Redirect;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use File;


class FilesHelper {

    const LOCATION  = "/products";

    public static function saveFiles($request, int $product_id){
        foreach ($request->addMoreFile as $key => $urlFile) {
            if($urlFile['urlFile'] === null) {
                return Redirect::to(self::LOCATION);
            } 
            $originalUrl = $urlFile['urlFile'];
            $contents    = file_get_contents($originalUrl);
            $name        = substr($originalUrl, strrpos($originalUrl, '/') + 1);
            $localUrl    = Storage::path($name);
            ProductImage::insert([['product_id' =>  $product_id, 'original_url' => $originalUrl, 'url' =>$localUrl]]);  
            Storage::put('/uploads/'.$product_id.'/'.$name, $contents);
            }
     }


     public static function updateFiles($request, int $product_id) {

        foreach ($request->addMoreFile as $key => $urlFile) {
        if($urlFile['urlFile'] === null) {
            return Redirect::to(self::LOCATION);
        }        
        $originalUrl = $urlFile['urlFile'];
        $contents    = file_get_contents($originalUrl);
        $name        = substr($originalUrl, strrpos($originalUrl, '/') + 1);
        $localUrl    = Storage::path($name);
        $img  = File::delete($localUrl);
        ProductImage::insert([['product_id' =>  $product_id, 'original_url' => $originalUrl, 'url' =>$localUrl]]);  
        Storage::put('/uploads/'.$product_id.'/'.$name, $contents);
        return MessagesHelper::getMessage(trans('lang.add_message'), trans('lang.image_updated_successfully'));
        }
    }

}
