module.exports = (gulp, plugins, config) => {

    let src = plugins.path.join(config.base, config.src);
    let dist = plugins.path.join(config.base, config.dist);
    let glob = `${src}/styles/*.scss`;

    this.task = () => {
        gulp.src(glob)
            .pipe(plugins.sourcemaps.init())
            .pipe(plugins.sass().on('error', plugins.sass.logError))
            .pipe(plugins.autoprefixer({
                'browsers': ['last 2 version']
            }))
            .pipe(plugins.minify({
                compatibility: '*', // (default) - Internet Explorer 10+ compatibility mode
                debug: true,
                specialComments: false,
            }))
            .pipe(plugins.sourcemaps.write())
            .pipe(plugins.rename(path => {
                path.basename += ".min";
            }))
            .pipe(gulp.dest(dist))
            .pipe(plugins.bs.stream())
    };

    return this.task;
};