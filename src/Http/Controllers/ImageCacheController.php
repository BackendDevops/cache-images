<?php

namespace Kvnc\CacheImages\Http\Controllers;

use App\Http\Controllers\Controller;
use Kvnc\CacheImages\Services\CacheImageService;

class ImageCacheController extends Controller
{
    public function __construct(protected CacheImageService $cacheImageService)
    {
    }

    public function index(string  $filter   , string $filename, string $module="")
    {
        $settings = [
            'filter' => $filter,
            'module' => $module,
            'filename' => $filename
        ];
        return $this->cacheImageService->cacheImages($settings);
    }
}
