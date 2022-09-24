<?php

namespace Kvnc\CacheImages\Facades;

use Illuminate\Support\Facades\Facade;

class ImageCacheFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
       return 'cache-images';
    }
}
