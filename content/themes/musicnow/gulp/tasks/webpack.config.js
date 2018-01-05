module.exports = (plugins, config) => {
    return {
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: [
                                ["env", {
                                    "targets": {
                                        "browsers": ["last 2 versions", "safari >= 7"]
                                    }
                                }]
                            ]
                        },
                    }
                },
            ],
        },
        externals: {
            jquery: 'jQuery'
        }

    }

};
