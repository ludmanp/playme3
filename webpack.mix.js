const mix = require('laravel-mix');
// var LiveReloadPlugin = require('webpack-livereload-plugin');

/**
 * Compile CSS
 */
mix.sass('resources/scss/admin.scss', 'public/css');
mix.sass('resources/scss/public.scss', 'public/css');
mix.sass('resources/scss/custom.scss', 'public/css');

/**
 * Compile JS
 */
mix.js('resources/js/admin.js', 'public/js').vue();
mix.js('resources/js/public.js', 'public/js');

/**
 * Copy CKEditor main files
 */
mix.copy('node_modules/ckeditor4/ckeditor.js', 'public/components/ckeditor4/ckeditor.js');
mix.copy('node_modules/ckeditor4/contents.css', 'public/components/ckeditor4/contents.css');

/**
 * Copy CKEditor lang files
 */
mix.copy('node_modules/ckeditor4/lang/ru.js', 'public/components/ckeditor4/lang/ru.js');
mix.copy('node_modules/ckeditor4/lang/en.js', 'public/components/ckeditor4/lang/en.js');

/**
 * Copy CKEditor plugins files
 */
var plugins = [
    'clipboard',
    'dialog',
    'dialogadvtab',
    'div',
    'embed',
    'embedbase',
    'image',
    'image2',
    'justify',
    'link',
    'magicline',
    'panelbutton',
    'pastefromgdocs',
    'pastefromlibreoffice',
    'pastefromword',
    'pastetools',
    'scayt',
    'showblocks',
    'specialchar',
    'table',
    'tableselection',
    'tabletools',
    'widget',
];
plugins.forEach(function (plugin) {
    mix.copy('node_modules/ckeditor4/plugins/' + plugin, 'public/components/ckeditor4/plugins/' + plugin);
});

/**
 * Copy CKEditor skins files
 */
mix.copy('node_modules/ckeditor4/skins', 'public/components/ckeditor4/skins');

/**
 * Versioning process
 */
mix.version();

/**
 * BrowserSync
 */
mix.browserSync({
    proxy: process.env.APP_URL,
    open: false,
    notify: false,
    ui: false,
    online: false,
    browser: 'google chrome',
});

/**
 * Options
 */
mix.options({
    processCssUrls: false,
});

/**
 * Livereload
 */
// mix.webpackConfig({
//     plugins: [new LiveReloadPlugin()],
// });

mix.webpackConfig(webpack => {
    return {
        plugins: [
            new webpack.ProvidePlugin({
                $: 'jquery',
                jQuery: 'jquery',
                'window.jQuery': 'jquery',
            })
        ]
    };
});

/**
 * Source maps
 */
// if (!mix.inProduction()) {
//     mix.webpackConfig({
//         devtool: 'source-map',
//     }).sourceMaps();
// }
