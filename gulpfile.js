var elixir = require('laravel-elixir');

elixir.config.js.browserify.watchify = {
    enabled: true,
    options: {
        poll: true
    }
}

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var bowerPath = '../../../bower_components/';

elixir(function(mix) {
    mix.sass('app.scss', 'resources/assets/css/app.css')
    	.styles([
            bowerPath + 'bootstrap/dist/css/bootstrap.css',
            bowerPath + 'font-awesome/css/font-awesome.css',
            bowerPath + 'sweetalert/dist/sweetalert.css',
    		'app.css'
    	], 'public/css/all.css')

        .styles([
            bowerPath +'owl-carousel/owl-carousel/owl.carousel.css',
            bowerPath +'owl-carousel/owl-carousel/owl.theme.css',
        ], 'public/css/carousel.css')

        .scripts([
            bowerPath + 'owl-carousel/owl-carousel/owl.carousel.js',
            'carousel.js'
        ], 'public/js/carousel.js')

        .scripts([
            bowerPath +'blazy/blazy.js',
            'blazy.js'
        ], 'public/js/blazy.js')

    	.scripts([
    		bowerPath + 'jquery/dist/jquery.js',
    		bowerPath + 'bootstrap/dist/js/bootstrap.js',
            bowerPath + 'sweetalert/dist/sweetalert-dev.js'
    	], 'public/js/all.js')

        .styles([
            bowerPath + 'jquery-ui/themes/smoothness/jquery-ui.css'
        ], 'public/css/datepicker.css')

        .scripts([
            bowerPath + 'jquery-ui/jquery-ui.js'
        ], 'public/js/datepicker.js')

        .copy('bower_components/bootstrap/dist/fonts/', 'public/build/fonts')
        .copy('bower_components/font-awesome/fonts/', 'public/build/fonts')
        .copy('bower_components/jquery-ui/themes/smoothness/images/', 'public/build/css/images')
        .copy('bower_components/owl-carousel/owl-carousel/grabbing.png', 'public/build/css/grabbing.png');

    mix.browserify('components/PropertiesContainer.js');
    mix.browserify('components/Countries.js');
    mix.browserify('components/PropertiesPerEmirate.js');
    mix.browserify('components/UpdateRoom.js');
    mix.browserify('components/AddNewRoom.js');
    mix.browserify('components/Bookingform.js');
    mix.browserify('components/RoomAmenities.js');

    mix.version([
        'public/css/all.css',
        'public/js/all.js',

        'public/css/datepicker.css',
        'public/js/datepicker.js',

        'public/css/carousel.css',
        'public/js/carousel.js',

        'public/js/blazy.js'
        ]);


});
