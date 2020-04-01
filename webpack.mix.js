const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            '@components' :__dirname + '/resources/js/components',
            '@repositories' :__dirname + '/resources/js/repositories',
        }
    }
});


mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
