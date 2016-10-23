var elixir = require('laravel-elixir');

var scripts = [
    './node_modules/foundation-sites/vendor/jquery/dist/jquery.js',
    './node_modules/foundation-sites/dist/foundation.js',
    './resources/js/app.js'
];

elixir(function(mix) {
    mix.scripts(scripts, './web/js/app.js')
        .sass('./resources/scss/app.scss', './web/css/all.css', null, {
            includePaths: ['node_modules/foundation-sites/scss/']
        });
});