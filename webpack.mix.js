const { mix } = require('laravel-mix');

var paths = {
    'bootstrap': './vendor/bower_components/bootstrap-sass-official/assets/',
    'jquery-ui': 'node_modules/jquery-ui-bundle/'
}

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

mix.js('resources/assets/js/main.js', 'public/js')
   .sass('resources/assets/sass/style.scss', 'public/css')
   .styles('node_modules/jquery-ui-bundle/jquery-ui.css', 'public/css/jquery-ui.css')
   .copyDirectory('resources/assets/img', 'public/images');;

mix.browserSync('bustaurant.dev');
