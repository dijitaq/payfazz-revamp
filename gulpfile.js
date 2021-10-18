const gulp = require( 'gulp' ),
	environments = require( 'gulp-environments' ),
	fancylog = require( 'fancy-log' ),
	browserSync = require( 'browser-sync' ),
	server = browserSync.create(),
	dev_url = 'http://localhost/starter-bootstrap';


var development = environments.development;
var production = environments.production;


/**
 * Define all source paths
 */

var paths = {
	styles: {
		src: './assets/**/*.scss',
		dest: './assets/css'
	},
	scripts: {
		src: './assets/*.js',
		dest: './assets/js'
	}
};


/**
 * Webpack compilation: http://webpack.js.org, https://github.com/shama/webpack-stream#usage-with-gulp-watch
 * 
 * build_js()
 */

function compile_scripts() {
	const compiler = require( 'webpack' ),
		webpackStream = require( 'webpack-stream' );

	return gulp.src( paths.scripts.src )
		.pipe(
			development(
				webpackStream( {
					config: require( './webpack.dev.js' )
				},
					compiler
				)
			)
		)
		.pipe(
			production(
				webpackStream( {
					config: require( './webpack.prod.js' )
				},
					compiler
				)
			)
		)
		.pipe(
			gulp.dest( paths.scripts.dest )
		)
		/*.pipe(
			server.stream() // Browser Reload
		)*/;
}


/**
 * SASS-CSS compilation: https://www.npmjs.com/package/gulp-sass
 * 
 * build_css()
 */

function compile_styles() {
	const sass = require( 'gulp-sass' )( require( 'sass' ) ),
		postcss = require( 'gulp-postcss' ),
		sourcemaps = require( 'gulp-sourcemaps' ),
		autoprefixer = require( 'autoprefixer' ),
		cssnano = require( 'cssnano' );

	const dev_plugins = [
		autoprefixer()
	];

	const prod_plugins = [
		autoprefixer(),
		cssnano(),
	];

	return gulp.src( paths.styles.src )
		.pipe(
			sourcemaps.init()
		)
		.pipe(
			sass()
				.on( 'error', sass.logError )
		)
		.pipe(
			development( postcss( dev_plugins ) )
		)
		.pipe(
			production( postcss( prod_plugins ) )
		)
		.pipe(
			sourcemaps.write( './' )
		)
		.pipe(
			gulp.dest( paths.styles.dest )
		)
		/*.pipe(
			server.stream() // Browser Reload
		)*/;
}

/**
 * Build task scripts only task
 */
gulp.task( 'scripts',
	compile_scripts
);

/**
 * Build task scripts only task
 */
gulp.task( 'styles',
	compile_styles
);

/**
 * Watch task: Webpack + SASS
 * 
 * $ gulp watch
 */

gulp.task( 'watch',
	function () {
		// Modify "dev_url" constant and uncomment "server.init()" to use browser sync
		/*server.init({
			proxy: dev_url,
		} );*/

		gulp.watch( paths.scripts.src, compile_scripts );
		gulp.watch( [ paths.styles.src, './assets/scss/*.scss' ], compile_styles );
	}
);

/**
 * Build task
 */
gulp.task( 'start', gulp.series( 'scripts', 'styles' ) );
gulp.task( 'build', gulp.series( 'scripts', 'styles' ) );