const mix = require('laravel-mix');

require('laravel-mix-polyfill');

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

mix.webpackConfig({
   module: {
     rules: [
       {
         test: /\.scss/,
         enforce: "pre",
         loader: "import-glob-loader"
       }
     ]
   }
 })

   .js('resources/js/app.js', 'public/js')
   .js('resources/js/props.js', 'public/js/app.js')
   .sourceMaps()
   .sass('resources/sass/app.scss', 'public/css')
   .browserSync({
    proxy: 'homestead.test/',
    files: [
       './public/css/app.css',
       './public/js/app.js',
       './resources/views/*.blade.php',
       './resources/views/**/*.blade.php',
    ],
  }).polyfill({
    enabled: true,
    useBuiltIns: "usage",
    targets: {"firefox": "50", "ie": 11}
 });
