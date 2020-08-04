 var themeName    = 'piotrkaluza';
var projectURL   = 'http://www.piotrkaluza.loc/'
// Theme Dir
var themeDir = './web/app/themes/' + themeName;

// Load Gulp...of course
var gulp         = require( 'gulp' );

// CSS related plugins
var less         = require( 'gulp-less' );
var autoprefixer = require( 'gulp-autoprefixer' );
var minifycss    = require( 'gulp-uglifycss' );

// JS related plugins
var concat       = require( 'gulp-concat' );
var uglify       = require( 'gulp-uglify' );
var babelify     = require( 'babelify' );
var browserify   = require( 'browserify' );
var source       = require( 'vinyl-source-stream' );
var buffer       = require( 'vinyl-buffer' );
var stripDebug   = require( 'gulp-strip-debug' );

// Utility plugins
var rename       = require( 'gulp-rename' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var notify       = require( 'gulp-notify' );
var plumber      = require( 'gulp-plumber' );
var options      = require( 'gulp-options' );
var gulpif       = require( 'gulp-if' );

// Browers related plugins
var browserSync  = require( 'browser-sync' ).create();
var reload       = browserSync.reload;

// Project related variables

var styleSRC     = themeDir + '/src/less/style.less';
var styleURL     = themeDir + '/assets/css/';
var mapURL       = './';

var jsSRC        = themeDir + '/src/scripts/';
var jsFront      = 'main.js';
var jsFiles      = [ jsFront ];
var jsURL        = themeDir + '/assets/js/';

var imgSRC       = themeDir + '/src/images/**/*';
var imgURL       = themeDir + '/assets/images/';

var fontsSRC     = themeDir + '/src/fonts/**/*';
var fontsURL     = themeDir + '/assets/fonts/';

var styleWatch   = themeDir + '/src/less/**/*.less';
var jsWatch      = themeDir + '/src/scripts/**/*.js';
var imgWatch     = themeDir + '/src/images/**/*.*';
var fontsWatch   = themeDir + '/src/fonts/**/*.*';
var phpWatch     = themeDir + '/**/*.php';

// Tasks
gulp.task( 'browser-sync', function() {
    browserSync.init({
        host: 'localhost',
        port: 3000,
        open: false,
        ghostMode: false,
        proxy: projectURL,
        injectChanges: true,
        notify: false
    });
});

gulp.task( 'styles', function() {
    gulp.src( [ styleSRC ] )
        .pipe( sourcemaps.init() )
        .pipe( plumber({errorHandler: notify.onError("Error: <%= error.message %>")}) )
        .pipe( less({compress: true}) )
        .on( 'error', console.error.bind( console ) )
        .pipe( autoprefixer({ browsers: [ 'last 2 versions', '> 5%', 'Firefox ESR' ] }) )
        .pipe( rename( { suffix: '.min' } ) )
        .pipe( sourcemaps.write( mapURL ) )
        .pipe( minifycss({ "maxLineLen": 150, "uglyComments": true }) )
        .pipe( gulp.dest( styleURL ) )
        .pipe( browserSync.stream() );
});

gulp.task( 'js', function() {
    jsFiles.map( function( entry ) {
        return browserify({
            entries: [jsSRC + entry]
        })
        .transform( babelify, { presets: [ 'env' ] } )
        .bundle()
        .on( 'error', notify.onError("Error: <%= error.message %>") )
        .pipe( plumber({errorHandler: notify.onError("Error: <%= error.message %>")}) )
        .pipe( source( entry ) )
        .pipe( buffer() )
        .pipe( gulpif( options.has( 'production' ), stripDebug() ) )
        .pipe( sourcemaps.init({ loadMaps: true }) )
        .pipe( uglify() )
        .pipe( sourcemaps.write( '.' ) )
        .pipe( gulp.dest( jsURL ) )
        .pipe( browserSync.stream() );
    });
 });

gulp.task( 'images', function() {
    triggerPlumber( imgSRC, imgURL );
});

gulp.task( 'fonts', function() {
    triggerPlumber( fontsSRC, fontsURL );
});

function triggerPlumber( src, url ) {
    return gulp.src( src )
    .pipe( plumber() )
    .pipe( gulp.dest( url ) );
}

 gulp.task( 'default', ['styles', 'js', 'images', 'fonts'], function() {
    gulp.src( jsURL + 'main.min.js' )
        .pipe( notify({ message: 'Assets Compiled!' }) );
 });

 gulp.task( 'watch', ['default', 'browser-sync'], function() {
    gulp.watch( phpWatch, reload );
    gulp.watch( styleWatch, [ 'styles' ] );
    gulp.watch( jsWatch, [ 'js', reload ] );
    gulp.watch( imgWatch, [ 'images' ] );
    gulp.watch( fontsWatch, [ 'fonts' ] );
    gulp.src( jsURL + 'main.min.js' )
        .pipe( notify({ message: 'Gulp is Watching, Happy Coding!' }) );
 });
