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
    protected  array $config;
    public Intervention\Image\Image $image;

    public function __construct()
    {
        $this->config = config('cache-image');
    }

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
                $this->image = Image::make(public_path('uploads/'.$module.'/originals/'.$file[0].'.'.$file[1]));

               return $this->process($filter,$module,$file)->response('webp',100);
            }

        }

        protected function process( string $filter, string $module, array $file): Image
        {
            if ($this->image->width() >= $this->image->height()){
                $this->image->resize($this->config['filters'][$filter]['width'],null,function ($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }
            if ($this->image->width() < $this->image->height()){
                $this->image->resize(null,$this->config['filters'][$filter]['width'],function ($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }
            $path = $this->config['mapping'][$module]."/".$filter."/".implode('.',$file);
            $this->image->save(public_path($path));
            return $this->image;
        }


}
