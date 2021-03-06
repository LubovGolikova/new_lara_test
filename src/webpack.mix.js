const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/main.scss', 'public/css', [
        //
    ])
    .sass('resources/sass/login.scss', 'public/css', [
        //
    ])
    .sass('resources/sass/new-question.scss', 'public/css', [
    //
    ])
    .sass('resources/sass/question.scss', 'public/css', [
        //
    ])
    .sass('resources/sass/register.scss', 'public/css', [
        //
    ]);
