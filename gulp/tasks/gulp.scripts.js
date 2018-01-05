module.exports = (gulp, plugins, config) => {

    let src = plugins.path.join(config.base, config.src);
    let dist = plugins.path.join(config.base, config.dist);
    let glob = `${src}/scripts/*.js`;
    let webpack = require('./webpack.config.js');

    this.task = () => {
        gulp.src(glob)
            .pipe(plugins.named())
            .pipe(plugins.gulpWebpack(
                webpack(plugins, config),
                plugins.webpack,
                (err, stats) => {
                    err ? console.log(err) : null;
                },
            ))
            .pipe(plugins.uglify())
            .pipe(plugins.rename(path => {
                path.basename += ".min";
            }))
            .pipe(gulp.dest(dist))
    };

    return this.task;

};