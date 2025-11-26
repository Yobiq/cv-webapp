<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | This application does not use a database.
    | All content is stored in config/cv.php
    |
    */

    'default' => 'array',

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | This application uses the array driver which requires no database.
    |
    */

    'connections' => [
        'array' => [
            'driver' => 'array',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | Not used - this application has no migrations.
    |
    */

    'migrations' => 'migrations',

];
