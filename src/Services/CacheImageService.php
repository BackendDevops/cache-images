<?php

namespace Kvnc\CacheImages\Services;

class CacheImageService
{
    public function __construct(protected ImageResizeService $imageResizeService)
    {
    }

    public function cacheImages(array $setting)
    {
        return $this->imageResizeService->resize($setting);

    }

    protected function isCached(array $settings)
    {

    }
    protected function isFileExist(array $settings)
    {

    }

}
