module.exports = (plugins, config) => {
    // Here we use a globbing pattern to match everything inside the `dist` folder

    let dist = plugins.path.join(config.base, config.dist);

    this.task = () => {
        plugins.del(
            [
                `${dist}/**/*`,
            ], {
                force: true,
            });
    };
    return this.task;
};