const mix = require('laravel-mix');

mix.js(['resources/js/app.js', 'resources/js/bootstrap.js', 'node_modules/jquery/dist/jquery.js'], 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .browserSync({
     proxy: 'blog.test'
   });
