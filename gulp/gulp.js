const config = require('../config.json');
const gulp = require('gulp');
const path = require('path');

for (let build in config.builds) {
    // Fixes our paths for our subdirectory ... should probably be evaluated with a root
    config.builds[build].base = path.resolve(`../${config.builds[build].base}`);
}

const plugins = {
    // General
    path: require('path'),
    bs: require('browser-sync').create(),
    del: require('del'),
    concat: require('gulp-concat'),
    sourcemaps: require('gulp-sourcemaps'),
    plumber: require('gulp-plumber'),
    rename: require('gulp-rename'),
    // CSS
    sass: require('gulp-sass'),
    minify: require('gulp-clean-css'),
    autoprefixer: require('gulp-autoprefixer'),
    // JS
    babel: require('gulp-babel'),
    uglify: require('gulp-uglify'),
    gulpWebpack: require('gulp-webpack'),
    webpack: require('webpack'),
    named: require('vinyl-named'), // using this to auto name files for webpack... supposedly.
};

const tasks = {
    styles: require('./tasks/gulp.styles'),
    scripts: require('./tasks/gulp.scripts'),
    browserSync: require('./tasks/gulp.browsersync'),
    sweep: require('./tasks/gulp.sweep'),
};

// General
gulp.task('browser-sync', tasks.browserSync(plugins, config));

for (let build in config.builds) {
    gulp.task(`${build}:styles`, tasks.styles(gulp, plugins, config.builds[build]));
    gulp.task(`${build}:scripts`, tasks.scripts(gulp, plugins, config.builds[build]));
    gulp.task(`${build}:sweep`, tasks.sweep(plugins, config.builds[build]));
}

gulp.task('watch', ['browser-sync'], () => {

    for (let build in config.builds) {
        let base = config.builds[build].base;
        let src = path.join(base, config.builds[build].src);
        gulp.watch(`${src}/styles/**/*.scss`, [`${build}:styles`]);
        gulp.watch(`${src}/scripts/**/*.js`, [`${build}:scripts`, plugins.bs.reload]);
        // gulp.watch(`${base}/**/*.php`, plugins.bs.reload);
    }

    gulp.watch('./**/*').on('change', () => {
        // Kill watch if we modify the gulp configuration
        process.exit(0)
    })
});


gulp.task('build', [].concat.apply([], Object.keys(config.builds).map(build => {
    // concat.apply flattens the array for our auto generated tasks
    return [
        `${build}:sweep`, // Clean out our dist folders
        `${build}:styles`,
        `${build}:scripts`,
    ]
})));