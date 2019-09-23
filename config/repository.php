<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default filter driver
    |--------------------------------------------------------------------------
    |
    */

    'default' => 'eloquent',

    /*
    |--------------------------------------------------------------------------
    | Supported drivers
    |--------------------------------------------------------------------------
    |
    | Laravel:  eloquent
    |
    */

    'drivers' => [
        'eloquent',
    ],

    /*
    |--------------------------------------------------------------------------
    | Global event listener
    |--------------------------------------------------------------------------
    |
    | The event listener added here takes effect globally
    |
    */
    'listener' => [
        'creating' => [],
        'created'  => [],
        'updating' => [],
        'updated'  => [],
        'deleting' => [],
        'deleted'  => [],
    ],
];