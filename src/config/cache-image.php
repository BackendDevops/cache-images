<?php

return [
    /**
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
];
