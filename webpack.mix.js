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

mix.js('resources/js/echo.js','public/js/echo.js').sass('resources/sass/icons.scss', 'public/css')
    .sass('resources/sass/style_cl.scss', 'public/css')
    .sass('resources/sass/style_dark.scss', 'public/css')
    .sass('resources/sass/site.scss', 'public/css')
    .sass('resources/sass/style.scss', 'public/css').version();

