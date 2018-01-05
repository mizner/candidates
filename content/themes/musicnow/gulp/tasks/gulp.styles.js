module.exports = (gulp, plugins, config) => {

    this.src = config.folder.src;
    this.dist = config.folder.dist;
    this.glob = `${this.src}/styles/**/*.scss`;
    this.sass = {
        outputStyle: 'expanded', // Options: nested, expanded, compact, compressed
    };
    this.minify = [{
        compatibility: '*', // (default) - Internet Explorer 10+ compatibility mode
        debug: true,
        specialComments: false

    }, (details) => {
        console.log(details.name + ': ' + details.stats.originalSize);
        console.log(details.name + ': ' + details.stats.minifiedSize);
    }];

    this.autoprefixer = {
        'browsers': ['last 2 version']
    };

    this.sorting = {
        "properties-order": [
            "margin",
            "padding",
            "border",
            "background"
        ]
    };

    this.task = () => {
        gulp.src(this.glob)
            .pipe(plugins.sourcemaps.init())
            .pipe(plugins.sass(this.sass).on('error', plugins.sass.logError))
            .pipe(plugins.postcss([
                plugins.sorting(this.sorting),
                plugins.autoprefixer(this.autoprefixer),
            ]))
            .pipe(plugins.minify(this.minify))
            .pipe(plugins.sourcemaps.write())
            .pipe(plugins.rename(path => {
                path.basename += ".min";
            }))
            .pipe(gulp.dest(this.dist))
            .pipe(plugins.bs.stream())
    };
    return this.task;
};