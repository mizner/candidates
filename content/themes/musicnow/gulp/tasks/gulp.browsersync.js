module.exports = (plugins, config) => {

    this.task = () => {
        plugins.bs.init(['*'], {
            proxy: config.local_uri,
            root: [__dirname],
            open: {
                file: 'index.php'
            }
        });
    };
    return this.task;
};