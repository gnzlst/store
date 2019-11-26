var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

var gulp = require('gulp');

elixir(function (mix) {
    mix.sass('resources/assets/sass/app.scss', 'resources/assets/css');
    mix.styles(
        [
            'css/app.css',
            'bower/vendor/slick-carousel/slick/slick.css'
        ],
        'public/css/all.css',
        'resources/assets'
    );

    var bowerPath = 'bower/vendor';

    mix.scripts(
        [
            bowerPath + '/jquery/dist/jquery.min.js',
            bowerPath + '/foundation-sites/dist/js/foundation.min.js',
            bowerPath + '/slick-carousel/slick/slick.min.js',
            bowerPath + '/PACE/pace.min.js',
            bowerPath + '/jquery-timeago/jquery.timeago.js',
            bowerPath + '/chart.js/dist/Chart.bundle.js',
            bowerPath + '/axios/dist/axios.min.js',
            'js/omdc.js',
            'js/admin/update.js',
            'js/admin/delete.js',
            'js/admin/create.js',
            'js/admin/registerUser.js',
            'js/admin/dashboard.js',
            'js/admin/events.js',
            'js/admin/loadTimeAgo.js',
            'js/admin/menuActive.js',
            'js/admin/stickyNav.js',
            'js/pages/slider.js',
            'js/pages/products.js',
            'js/pages/home_products.js',
            'js/pages/product_details.js',
            'js/pages/cart.js',
            'js/pages/lib.js',
            'js/init.js'
        ],
        'public/js/all.js',
        'resources/assets'
    );
});