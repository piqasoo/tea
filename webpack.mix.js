let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js')
mix.js([
    'resources/assets/js/app.js',
    'resources/assets/js/init.js'
], 'public/js').extract([
            'vue',
            'jquery',
            'lodash',
        ])
        .autoload({
            jquery: ['$', 'window.jQuery', 'jQuery'],
            lodash: ['_', 'window._', 'lodash'],
            vue: ['Vue', 'window.Vue', 'vue']
    });
   mix.sass('resources/assets/sass/app.scss', 'public/css');
