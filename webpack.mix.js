let mix = require('laravel-mix');

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
// mix.js('resources/assets/js/app.js', 'public/js');

mix.sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/admin.scss', 'public/css');

mix.styles([
    'resources/assets/mdb/bootstrap.min.css',
    'resources/assets/mdb/mdb.min.css'
], 'public/css/mdb.css');

mix.copy('resources/assets/mdb/font', 'public/font');

mix.copy('resources/assets/mdb/jquery-3.3.1.min.js', 'public/js');
mix.copy('resources/assets/mdb/popper.min.js', 'public/js');
mix.copy('resources/assets/mdb/bootstrap.min.js', 'public/js');
mix.copy('resources/assets/mdb/mdb.min.js', 'public/js');


//Połączyć style w jeden i JS w jeden require('./bootstrap'); 