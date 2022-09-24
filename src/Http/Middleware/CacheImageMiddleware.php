<?php

namespace Kvnc\CacheImages\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageCache;

class CacheImageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (array_key_exists('module',$request->route()->parameters())){
            [
                'module' => $module,
                'filter' => $filter,
                'filename' => $filename
            ] =   $request->route()->parameters();
        }else{
            [
                'filter' => $filter,
                'filename' => $filename
            ] =   $request->route()->parameters();
            $module = '';
        }

        if (!str_contains($filename,'_')){
            return $next($request);
        }
        $file = explode('_',$filename);
        $filename = $file[0];
        $extension = $file[1];
        if ($module==""){
            $is_exists = File::exists(public_path('uploads/'.$filter."/".$filename."webp"));
        }else{
            $is_exists = File::exists(public_path('uploads/'.$module."/".$filter."/".$filename."webp"));
        }
        if ($is_exists){
            if ($module==""){
                $img = public_path('uploads/'.$filter."/".$filename."webp");

            }else{
                $img = public_path('uploads/'.$module."/".$filter."/".$filename."webp");
            }
            $response = Response::make($img);
            $response->header('Content-Type', 'image/webp');
            return $response;
        }
        return $next($request);
    }
}
