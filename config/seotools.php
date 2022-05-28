<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "", // set false to total remove
            'titleBefore'  => "", // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Top Programming Articles', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['learn php,learn laravel,php,laravel,web design,web development,programming articles,web articles,top programming articles'],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'index, follow', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Learn to Code', // set false to total remove
            'description' => 'Top Programming Articles', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => "website",
            'site_name'   => "Learn to Code",
            'images'      => ["http://127.0.0.1:8000/laravel-logo.min.svg"],
            'brand'       => "Learn to Code",
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'            => 'summary',
            'site'            => '@mmohammadpanah',
            'title'           => 'Learn to Code',
            'description'     => 'Top Programming Articles', // set false to total remove
            'image'           => "http://127.0.0.1:8000/laravel-logo.min.svg",
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Learn to Code', // set false to total remove
            'description' => 'Top Programming Articles', // set false to total remove
            'url'         => "http://127.0.0.1:8000", // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
