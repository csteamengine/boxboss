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

mix.setPublicPath('public')
    .setResourceRoot('../') // Turns assets paths in css relative to css file
    // .options({
    //     processCssUrls: false,
    // })
    .sass('resources/sass/frontend/app.scss', 'css/frontend.css')
    .sass('resources/sass/backend/app.scss', 'css/backend.css')
    .styles(['vendor/snapappointments/bootstrap-select/dist/css/bootstrap-select.css'], 'public/css/snapappointments/bootstrap-select.css')
    .styles([
        'node_modules/@fullcalendar/core/main.css',
        'node_modules/@fullcalendar/bootstrap/main.css',
        'node_modules/@fullcalendar/daygrid/main.css',
        'node_modules/@fullcalendar/timegrid/main.css',
        'node_modules/@fullcalendar/list/main.css'
    ], 'public/css/fullcalendar/fullcalendar.css')
    .js('resources/js/frontend/app.js', 'js/frontend.js')
    .js('resources/js/backend/features/features.js', 'js/backend/features/features.js')
    .js('resources/js/backend/boxes/boxes.js', 'js/backend/boxes/boxes.js')
    .js('resources/js/backend/boxes/manage.js', 'js/backend/boxes/manage.js')
    .js('vendor/snapappointments/bootstrap-select/dist/js/bootstrap-select.min.js', 'js/snapappointments/bootstrap-select.min.js')
    .js([
        'resources/js/backend/before.js',
        'resources/js/backend/app.js',
        'resources/js/backend/after.js'
    ], 'js/backend.js')
    .extract([
        // Extract packages from node_modules to vendor.js
        'jquery',
        'bootstrap',
        'popper.js',
        'axios',
        'sweetalert2',
        'lodash',
        'fullcalendar'
    ])
    .sourceMaps();

module.exports = {
    entry: [
        'fullcalendar',
    ]
};

if (mix.inProduction()) {
    mix.version()
        .options({
            // Optimize JS minification process
            terser: {
                cache: true,
                parallel: true,
                sourceMap: true
            }
        });
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
}
