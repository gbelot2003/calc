const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
        .sass('bootstrap.scss')
        .sass('login.scss')
        .less('admin.less')
        .styles([
            'blue.css',
            'morris.css',
            'bootstrap3-wysihtml5.all.js',
            'datepicker3.css',
            'daterangepicker.css',
            'jquery-jvectormap-1.2.2.css',
        ], 'public/css/admin-heps.css')
        .scripts([
            'plugins/jQuery/jquery-2.2.3.min.js',
            'plugins/jQueryUI/jquery-ui.min.js',
            'plugins/bootstrap/bootstrap.js',
            'plugins/raphael-min.js',
            'plugins/morris/morris.min.js',
            'plugins/sparkline/jquery.sparkline.min.js',
            'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
            'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
            'plugins/knob/jquery.knob.js',
            'plugins/daterangepicker/moment.min.js',
            'plugins/daterangepicker/daterangepicker.js',
            'plugins/datepicker/bootstrap-datepicker.js',
            'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
            'plugins/slimScroll/jquery.slimscroll.min.js',
            'plugins/fastclick/fastclick.js',
            'plugins/app.js',
            'plugins/demo.js',

        ], 'public/js/main.js')
        .webpack('app.js');
});