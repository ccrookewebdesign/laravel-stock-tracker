/*const mix = require('laravel-mix');*/

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

/*mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');*/


const mix = require('laravel-mix');

require('laravel-mix-purgecss');

// const mix = require("laravel-mix-tailwind");
const tailwindcss = require('tailwindcss')

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    /*.options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })*/
    .purgeCss({
        whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/]
    });
