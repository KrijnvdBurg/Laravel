var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.less('app.less');
	mix.sass('app.scss', 'resources/assets/css/libs/app.css');
	mix.sass('header.scss', 'resources/assets/css/libs/header.css');
	mix.sass('footer.scss', 'resources/assets/css/libs/footer.css');

	mix.styles([
		'libs/app.css',
		'libs/select2.min.css',
		'libs/jquery.mCustomScrollbar.css',
		'libs/normalize.css',
		'libs/style.css',
		'libs/header.css',
		'libs/footer.css',
		'libs/asideLatest.css',
		'libs/articles_general.css'
		
	]);

	mix.scripts([
		'libs/jquery.min.js',
		'libs/bootstrap.min.js',
		'libs/select2.min.js',
		'libs/jquery.mousewheel.min.js',
		'libs/jquery.mCustomScrollbar.min.js',
		

		'libs/articlesIndex.js'

	]);


});
