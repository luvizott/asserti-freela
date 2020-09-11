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

mix

    .sass('node_modules/bootstrap/scss/bootstrap.scss',
    '../public_html/site/bootstrap.css')

    .styles([
        'resources/views/site/css/style.css'
    ], '../public_html/site/css/style.css')
    .styles([
        'resources/views/admin/css/style.css'
    ], '../public_html/admin/css/style.css')

    .scripts([
        'resources/views/site/js/script.js'
    ], '../public_html/site/js/script.js')
    .scripts('resources/views/admin/js/script.js', 
    '../public_html/admin/js/script.js')
    .scripts('node_modules/jquery/dist/jquery.js',   
    '../public_html/site/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 
    '../public_html/site/bootstrap.js');