const mix = require('laravel-mix');
const ngrok = require('ngrok');
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
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps(true, 'source-map')
    .version()
    .disableNotifications();

mix.browserSync({
    proxy: 'vinyl_shop.test',
    port: 3000,
    callbacks: {
        ready:async function (err, bs) {
            const tunnel = await ngrok.connect({
                port: bs.options.get('port'),
                region: 'eu'
            });
            console.log(' ------------------------------------------------');
            console.log(`  ngrok control panel: http://localhost:4040`);
            console.log(`  public URL running at: ${tunnel}`);
            console.log(' ------------------------------------------------');
        }
    }
});
