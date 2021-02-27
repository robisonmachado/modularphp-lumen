const mix = require('laravel-mix');

//require('vue-template-compiler');

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


mix.js(['resources/js/app.js', 'resources/js/main.js'], 'public/js')

    .sourceMaps()
    /* .styles([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
    ], 'public/css/teste.css') */
    .sass('resources/scss/app.scss', 'public/css');
