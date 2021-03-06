<?php


return [
    /*
     * Package version
     */
    'package_version' => '1.0.0',
    /*
     * URL Prefix
     */
    'url_prefix' => 'admin',

    /*
    * Views Prefix
    */
    'views_prefix' => 'administration',
    'admin_prefix' => 'administration',


    /*
     * Administrator guard name
     */
    'guard' => 'administrator',

    'file_prefix' => 'charlotte/administration/',

    /*
     * Supported Languages
     */
    'admin_supported_locales' => [
        'en',
        'bg',
        'fr'
    ],

    /*
   * Settings Images Conversions
   */
    'settings_images' => [
        'thumb' => [
            'width' => 100,
            'height' => 100,
        ],
    ],

    //Default fields for settings
    'settings_default_fields' => [
        'website_title' => [
            'title' => 'administration::admin.website_name',  //this will be converted to trans
            'type' => 'text'
        ],
        'facebook' => [
            'title' => 'index::admin.facebook',  //this will be converted to trans
            'type' => 'text'
        ],
        'linkedin' => [
            'title' => 'index::admin.linkedin',  //this will be converted to trans
            'type' => 'text'
        ],
        'instagram' => [
            'title' => 'index::admin.instagram',  //this will be converted to trans
            'type' => 'text'
        ],
        'logo_light' => [
            'title' => 'index::admin.logo_light',  //this will be converted to trans
            'type' => 'file'
        ],
        'logo_dark' => [
            'title' => 'index::admin.logo_dark',  //this will be converted to trans
            'type' => 'file'
        ],
        'brand_logo' => [
            'title' => 'index::admin.brand_logo',  //this will be converted to trans
            'type' => 'file'
        ],
    ]
];
