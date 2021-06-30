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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css', {
        prependData: '$APP_URL:\'' + process.env.APP_URL + '\';'
    })
    .sass('resources/sass/article.scss', 'public/css')
    .sass('resources/sass/pictures.scss', 'public/css')
    .sass('resources/sass/faq.scss', 'public/css')
    .sass('resources/sass/playlist.scss', 'public/css')
    .sass('resources/sass/shop.scss', 'public/css',{
        prependData: '$APP_URL:\'' + process.env.APP_URL + '\';'
    })
    .sass('resources/sass/review.scss', 'public/css')
    .sass('resources/sass/cart.scss', 'public/css')
    .sass('resources/sass/thank.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css',{
        prependData: '$APP_URL:\'' + process.env.APP_URL + '\';'
    })
    .version();
