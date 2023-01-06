const cssnano = require("cssnano");
module.exports = {
    plugins: [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
        require("postcss-nested"),
        cssnano({
            preset: "default",
        }),
    ],
};
