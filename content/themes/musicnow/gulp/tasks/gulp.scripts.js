module.exports = (gulp, plugins, config) => {

    this.src = plugins.path.resolve(config.folder.src);
    this.dist = plugins.path.resolve(config.folder.dist);
    this.glob = `${this.src}/scripts/*.js`;
    this.webpack = require('./webpack.config.js');

    this.task = () => {
        gulp.src(this.glob)
            .pipe(plugins.named())
            .pipe(plugins.gulpWebpack(
                this.webpack(plugins, config),
                plugins.webpack,
                (err, stats) => {
                    console.log(err)
                },
            ))
            // .pipe(plugins.uglify())
            .pipe(plugins.rename(path => {
                path.basename += ".min";
            }))
            .pipe(gulp.dest(this.dist))
    };

    return this.task;

};