/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
                ubuntu: "Ubuntu",
                tilt: "Signika Negative",
            },
        },
    },
    plugins: [require("./node_modules/tw-elements/dist/plugin")],
};
