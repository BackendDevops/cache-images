<?php


if (!function_exists('getResizedImageUrl')){
    function getResizedImageUrl($filter,$module,$image_url): string
    {
        $image = implode('+',explode('.',basename($image_url)));
        return route('kvnc_image_cache.cache',['filter'=>$filter,'module' => $module, 'filename'=> $image]);
    }
}
