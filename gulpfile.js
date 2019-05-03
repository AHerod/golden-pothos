const gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    sass = require('gulp-sass'),
    sassLint = require('gulp-sass-lint'),
    esLint = require('gulp-eslint'),
    postcss = require('gulp-postcss'),
    autoprefixer = require('autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    groupmq = require('gulp-group-css-media-queries'),
    browserSync = require('browser-sync'),
    sass_paths = './src/css/**/*.scss';
js_paths = './src/js/*.js';

gulp.task('styles', (function () {
    gulp.src('./src/css/style.scss')
        .pipe(plumber())
        .pipe(sassLint())
        .pipe(sassLint.format())
        .pipe(sassLint.failOnError())
        .pipe(sass({
            indentType: 'tab',
            indentWidth: 1,
            outputStyle: 'expanded',
        })).on('error', sass.logError)
        .pipe(groupmq())
        .pipe(sourcemaps.init())
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(postcss([
            autoprefixer({
                browsers: ['last 2 versions'],
                cascade: false,
            })
        ]))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream({
            stream: true
        }))
}));

gulp.task('scripts', function () {
    gulp.src('./src/js/*.js')
        .pipe(esLint({
                files: {
                    ignore: ['./src/js/bootstrap.bundle.js', './src/js/bootstrap.js', './src/js/jquery.min.js']
                }
            }
        ))
        .pipe(esLint.format())
        .pipe(esLint.failAfterError())
        .pipe(sourcemaps.init())
        .pipe(browserSync.reload({
            stream: true
        }));
});


gulp.task('php', function () {
    gulp.src('./*.php')
        .pipe(gulp.dest('./'))
});


gulp.task('browserSync', function () {
    browserSync.init({
        open: false,
        proxy: 'http://localhost/wordpress'
    });
});


gulp.task('watch', ['browserSync', 'styles', 'scripts'], function () {

    // gulp.watch([sass_paths, js_paths] ,['browserSync', 'styles', 'scripts']);
    // gulp.watch(js_paths, ['browserSync', 'scripts']);
    gulp.watch([js_paths], ['scripts']);
    gulp.watch([sass_paths], ['styles']);
    gulp.watch('./*.php', ['php']).on('change', browserSync.reload);
});

gulp.task('default', ['watch']);

