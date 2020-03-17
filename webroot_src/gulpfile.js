const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const cleanCss = require('gulp-clean-css');
const rename = require('gulp-rename');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const path = require('path');
const __webrootdir = path.resolve(__dirname, '../webroot');

// javascripts
// -----------------------------------------------------------------------------------------------------
gulp.task('copy-js', () => {
    return gulp
        .src([
            'node_modules/vue/dist/vue.js',
            'node_modules/vue/dist/vue.min.js',
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/popper.js/dist/umd/popper.min.js',
            'node_modules/bootstrap/dist/js/bootstrap.min.js',
            'node_modules/stickybits/dist/jquery.stickybits.min.js',
            'js/main.js',
        ])
        .pipe(gulp.dest(path.resolve(__webrootdir, 'js')))
});

// fonts
// -----------------------------------------------------------------------------------------------------
gulp.task('copy-fonts', () => {
    return gulp
        .src([
            'node_modules/@fortawesome/fontawesome-free/webfonts/*'
        ])
        .pipe(gulp.dest(path.resolve(__webrootdir, 'font')));
});

// gulp.task('copy-css', () => {
//     return gulp
//     .src(['node_modules/animate.css/animate.min.css'])
//     .pipe(gulp.dest(path.resolve(__webrootdir, 'css')));
// });

// styles sources
gulp.task('build', gulp.parallel('copy-js', 'copy-fonts', () => {
    return gulp
        .src(['scss/*.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([
            autoprefixer({
                browsers: [
                    'Chrome >= 35',
                    'Firefox >= 38',
                    'Edge >= 12',
                    'Explorer >= 10',
                    'iOS >= 8',
                    'Safari >= 8',
                    'Android 2.3',
                    'Android >= 4',
                    'Opera >= 12',
                ]
            })
        ]))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.resolve(__webrootdir, 'css')))
        .pipe(cleanCss())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.resolve(__webrootdir, 'css')));
}));

gulp.task('watch', gulp.parallel('build', () => {
    gulp.watch(['scss/**/*.scss', 'js/**/*.js'], gulp.parallel('build'));
}));

gulp.task('default', gulp.parallel('build'));
