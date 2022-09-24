<?php

use Illuminate\Support\Facades\Route;
use Kvnc\CacheImages\Http\Controllers\ImageCacheController;
Route::get('image-repo/{filter}/{filename}', [ImageCacheController::class,'withoutModule'])
    ->name('kvnc_image_cache.cache')->middleware('image-cache');
Route::get('image-repo/{filter}/{module}//{filename}', [ImageCacheController::class,'index'])
    ->name('kvnc_image_cache.cache')->middleware('image-cache');
Route::
