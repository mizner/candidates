module.exports = (() => {
    /**
     * What we want is to establish where our project directory starts, in this setup it should be the same as where package.json lives
     */
    return process.env.PWD;
})();