var webpack = require("webpack");
module.exports = {
    entry: ["./src/js/app.js"],
    module: {
        rules: [
            { test: /\.jsx?$/, use: "babel-loader", exclude: /node_modules/ },
        ],
    },
    output: {
        filename: "app.min.js",
        path: __dirname + "/src/js/",
    },
    mode: "development",

    plugins: [
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
        }),
    ],
};
