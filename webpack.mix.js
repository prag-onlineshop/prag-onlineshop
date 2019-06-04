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

mix.copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css');
mix.copy('node_modules/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css', 'public/css');
mix.copy('node_modules/font-awesome/css/font-awesome.min.css', 'public/css');
mix.copy('node_modules/admin-lte/plugins/iCheck/flat/blue.css', 'public/css');



mix.copy('node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/js');
mix.copy('node_modules/admin-lte/plugins/jquery/jquery.min.js', 'public/js');





mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
