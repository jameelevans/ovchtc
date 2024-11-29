const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass'));
const webpack = require('webpack');
const log = require('fancy-log'); // Replaces gutil.log
const PluginError = require('plugin-error'); // Replaces gutil.PluginError

// Dynamic autoprefixer import
async function getAutoprefixer() {
    const { default: autoprefixer } = await import('gulp-autoprefixer');
    return autoprefixer;
}

// Compile styles
gulp.task('styles', async () => {
    const autoprefixer = await getAutoprefixer();
    return gulp
        .src('./assets/css/style.scss')
        .pipe(sass({ errLogToConsole: true, outputStyle: 'expanded' }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream());
});

// Compile scripts using Webpack
gulp.task('scripts', (callback) => {
    log('Starting Webpack...');
    webpack(require('./webpack.config.js'), function (err, stats) {
        if (err) {
            log('Webpack error:', err.toString());
            callback(new PluginError('scripts', err));
            return;
        }
        log('Webpack completed.');
        log(stats.toString());
        browserSync.reload();
        callback();
    });
});

// Watch files for changes
gulp.task('watch', () => {
    log('Starting BrowserSync...');
    browserSync.init({
        notify: false,
        proxy: 'http://ovc-htc.local', // Update to match your local environment
        ghostMode: false
    });
    log('BrowserSync started, watching files...');

    // Watch PHP files
    gulp.watch('./**/*.php', (done) => {
        log('PHP file changed, reloading...');
        browserSync.reload();
        done();
    });

    // Watch SCSS files
    gulp.watch('./assets/css/**/*.scss', gulp.series('styles'));

    // Watch JS files
    gulp.watch(['./assets/js/modules/*.js', './assets/js/scripts.js'], gulp.series('scripts'));
});

// Default task
gulp.task('default', gulp.series('watch'));