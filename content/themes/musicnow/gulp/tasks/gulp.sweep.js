module.exports = (plugins, config) => {
    // Here we use a globbing pattern to match everything inside the `dist` folder
    this.folders = [
        `${config.folder.dist}/**/*`,
    ];
    this.options = {
        force: true,
    };

    this.task = () => {
        plugins.del(this.folders, this.options);
    };
    return this.task;
};