<?php

namespace Kvnc\CacheImages\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageResizeService
{
    protected array $smallest = ['width' =>60 , 'height' =>60 ];
    protected array $small = ['width' => 360, 'height' => 190]; // listing card
    protected array $medium = ['width'=> 600 ,'height' => 400];
    protected array $large = ['width' => 1280, 'height' => 900];

        public function resize(array $settings)
        {
            [
                'module' => $module,
                'filter' => $filter,
                'filename' => $filename
            ] = $settings;
            if (str_contains($filename,'_')){
                $file = explode('_',$filename);
                File::ensureDirectoryExists(public_path('uploads/'.$module.'/'.$filter));
                $image = Image::make(public_path('uploads/'.$module.'/'.'originals/'.$file[0].'.'.$file[1]));

                $image->resize($this->{$filter}['width'],$this->{$filter}['height'],function($constraint){
                  $constraint->aspectRatio();
                  $constraint->upsize();
                })->save(public_path('uploads/'.$module.'/'.$filter."/".$file[0].".webp"),100,'webp');
               return $image->response('webp',100);
            }

        }
}
