[![Latest Version on Packagist](https://img.shields.io/packagist/v/kvnc/cache-images.svg?style=flat-square)](https://packagist.org/packages/kvnc/cache-images)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kvnc/resize-images/run-tests?label=tests)](https://github.com/kvnc/resize-images/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/kvnc/resize-images/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/kvnc/resize-images/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kvnc/cache-images.svg?style=flat-square)](https://packagist.org/packages/kvnc/cache-images)

## Introduction
Welcome to my first laravel library

This library has 2 configs which sets original file paths and filters (resizing templates)

````  /**
     * Mapping key represent where the original image file placed
     * Example you store your blog images into uploads/blogs
     * Then your mapping should be like 'mapping' => [
     *  "blogs" => "uploads/blogs"
     * ]
     * blogs key represent the module parameter of your route , This means when you send blogs module parameter
     *  Library will search under uploads/blogs to find original file
     */
    'mapping' => [

    ],
    /**
     * Filters key represent the resizing width and height of template
     *  such as  'thumb' => ['width' => 100 ,'height' => 100 ]
     */
    'filters' => [

    ]
````
As you can see above you should set mapping and filters attributes of cache-image config file.


###How to install
```` 
composer require kvnc/cache-images
````
Run this command on your terminal at the root of your laravel project

##Configure
To publish config file you should do vendor publish action
````
     php artisan vendor:publish --provider=Kvnc\CacheImages\CacheImageProvider
````
Then set config file 
And set your image file name eg duplicated.jpg to duplicated+jpg and send to route

you can use our helper function to send file on route

```
function getResizedImageUrl($filter,$module,$image_url): string
{
    $image = implode('+',explode('.',basename($image_url)));
    return route('kvnc_image_cache.cache',['filter'=>$filter,'module' => $module, 'filename'=> $image]);
}
```

Call ```getResizedImageUrl ``` in any image tag you need

Have fun
Thanks for reading

[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/kvncphp)



