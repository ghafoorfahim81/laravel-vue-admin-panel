<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie','http://sockjs-mt1.pusher.com','http://sockjs-mt1.pusher.com/pusher/app//545/63bnje1i/xhr_streaming?protocol=7&client=js&version=4.4.0&t=1650254922508&n=1'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => ['*'],

    'allowed_headers' => ['*'],

    'exposed_headers' => ['*'],

    'max_age' => 0,

    'supports_credentials' => true,

];
