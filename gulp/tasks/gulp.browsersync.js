module.exports = (plugins, config) => {
    this.task = () => {
        plugins.bs.init(['*'], {
            proxy: config.dev_site,
            port: 5586,
            root: [__dirname],
            online: true,
            open: {
                file: 'index.php'
            }
        });
    };
    return this.task;
};