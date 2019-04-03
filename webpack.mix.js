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

mix.js('resources/js/listar.js', 'public/js')
    .js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
//    .sass('resources/fonts/roboto/Roboto-Regular.woff', 'public/fonts/roboto/Roboto-Regular.woff')
//    .sass('resources/fonts/roboto/Roboto-Regular.woff2', 'public/fonts/roboto/Roboto-Regular.woff2')
//    .sass('resources/fonts/roboto/Roboto-Bold.woff', 'public/fonts/roboto/Roboto-Bold.woff')
//    .sass('resources/fonts/roboto/Roboto-Bold.woff2', 'public/fonts/roboto/Roboto-Bold.woff2')
//    .sass('resources/fonts/roboto/Roboto-Light.woff', 'public/fonts/roboto/Roboto-Light.woff')
//    .sass('resources/fonts/roboto/Roboto-Light.woff2', 'public/fonts/roboto/Roboto-Light.woff2')

//    .sass('resources/fonts/roboto/Roboto-Medium.woff2', 'public/fonts/roboto/Roboto-Mediumld.woff2')
//    .sass('resources/fonts/roboto/Roboto-Medium.woff', 'public/fonts/roboto/Roboto-Medium.woff')

//    .sass('resources/fonts/roboto/Roboto-Thin.woff2', 'public/fonts/roboto/Roboto-Thin.woff2')
//    .sass('resources/fonts/roboto/Roboto-Thin.woff', 'public/fonts/roboto/Roboto-Thin.woff');


mix.styles([
    'resources/css/materialize.css'
], 'public/css/materialize.css');

// mix.js('resources/js/materialize.min.js', 'public/static/js/materialize.min.js')
//    .sourceMaps();
