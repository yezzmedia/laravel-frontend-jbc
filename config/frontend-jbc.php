<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Project
    |--------------------------------------------------------------------------
    |
    | When no domain-based project resolution is configured, this project ID
    | will be used for all frontend requests. Set to null to disable.
    |
    */
    'default_project_id' => env('FRONTEND_JBC_PROJECT_ID', 1),

    /*
    |--------------------------------------------------------------------------
    | Brand Colors
    |--------------------------------------------------------------------------
    |
    | CSS custom colors used throughout the theme. These correspond to
    | Tailwind color tokens defined in the host application.
    |
    */
    'brand' => [
        'primary' => '#e67e23',
        'primary_name' => 'prime_brand',
        'background' => 'prime_bg',
        'font_color' => 'prime_font_color',
        'font_family' => 'prime_font',
    ],

    /*
    |--------------------------------------------------------------------------
    | Site Information
    |--------------------------------------------------------------------------
    */
    'site_name' => env('FRONTEND_JBC_SITE_NAME', 'Julisbookcorner'),

    'tagline' => env('FRONTEND_JBC_TAGLINE', ''),

    /*
    |--------------------------------------------------------------------------
    | Social Links
    |--------------------------------------------------------------------------
    */
    'social' => [
        'facebook' => env('FRONTEND_JBC_FACEBOOK', 'http://www.facebook.de/julisbookcorner'),
        'twitter' => env('FRONTEND_JBC_TWITTER', 'https://www.twitter.com/julisbookcorner'),
        'instagram' => env('FRONTEND_JBC_INSTAGRAM', 'https://www.instagram.com/julisbookcorner'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Blog
    |--------------------------------------------------------------------------
    */
    'blog' => [
        'posts_per_page' => 25,
    ],

    /*
    |--------------------------------------------------------------------------
    | Static Pages
    |--------------------------------------------------------------------------
    |
    | Known page slugs that are served by the static pages module.
    |
    */
    'static_pages' => ['vita', 'rating', 'privacy', 'imprint'],

    /*
    |--------------------------------------------------------------------------
    | Navigation Sections
    |--------------------------------------------------------------------------
    */
    'navigation_sections' => ['header', 'footer'],

    /*
    |--------------------------------------------------------------------------
    | Wishlist
    |--------------------------------------------------------------------------
    */
    'wishlist_url' => env('FRONTEND_JBC_WISHLIST_URL', 'https://www.amazon.de/hz/wishlist/ls/19KFDNNI07BK4'),

];
