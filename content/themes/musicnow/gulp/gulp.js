const config = require('../config.json');

const gulp = require('gulp');

const root = require('./root');

const plugins = {
    // General
    bs: require('browser-sync').create(),
    del: require('del'),
    concat: require('gulp-concat'),
    sourcemaps: require('gulp-sourcemaps'),
    path: require('path'),
    plumber: require('gulp-plumber'),
    rename: require('gulp-rename'),
    // CSS
    sass: require('gulp-sass'),
    postcss: require('gulp-postcss'),
    minify: require('gulp-clean-css'),
    autoprefixer: require('autoprefixer'),
    sorting: require('postcss-sorting'),
    // JS
    babel: require('gulp-babel'),
    uglify: require('gulp-uglify'),
    gulpWebpack: require('gulp-webpack'),
    webpack: require('webpack'),
    named: require('vinyl-named'), // using this to auto name files for webpack... supposedly.

};

config.folder.src = plugins.path.join(root, config.folder.src);
config.folder.dist = plugins.path.join(root, config.folder.dist);

const tasks = {
    styles: require('./tasks/gulp.styles'),
    scripts: require('./tasks/gulp.scripts'),
    browserSync: require('./tasks/gulp.browsersync'),
    sweep: require('./tasks/gulp.sweep'),
};


gulp.task('styles', tasks.styles(gulp, plugins, config));
gulp.task('scripts', tasks.scripts(gulp, plugins, config));
gulp.task('browser-sync', tasks.browserSync(plugins, config));
gulp.task('sweep:dist', tasks.sweep(plugins, config));
gulp.task('watch', ['browser-sync'], () => {
    gulp.watch(`${config.folder.src}/styles/**/*.scss`, ['styles']);
    gulp.watch(`${config.folder.src}/scripts/**/*.js`, ['scripts']);
    gulp.watch(`${root}/scripts/**/*.js`, plugins.bs.reload);
    gulp.watch(`${root}/**/*.php`, plugins.bs.reload);

    gulp.watch(`${__dirname}/gulp.js`).on('change', () => {
        process.exit(0)
    })
});

gulp.task('build', [
    'sweep:dist',
    'styles',
    'scripts'
]);

gulp.task('sweep', [
    'sweep:dist',
]);