const mix = require('laravel-mix');


mix
    .js(['resources/js/bootstrap.js'], 'public/js/tmp/bootstrap.js')
    .ts(['resources/js/app.ts'], 'js/tmp/app.es6.js')
    .vue()
    .babel('public/js/tmp/bootstrap.js', 'public/js/bootstrap.js')
    .babel('public/js/tmp/app.es6.js', 'public/js/app.js')

    .sass('resources/scss/app.scss', 'public/css')
    .webpackConfig({

    })






let url = 'http://localhost:8000';
mix.browserSync({
    proxy: url
});
