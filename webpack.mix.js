const mix = require('laravel-mix');

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

mix.js('resources/js/comments.js', 'public/coopfon/js')
    .js('resources/js/login.js', 'public/coopfon/js')
    .js('resources/js/search.js', 'public/coopfon/js')
    .sass('resources/sass/coopfon.scss', 'public/coopfon/css')
    .sass('resources/sass/coopfon-kit.scss', 'public/coopfon/css');
