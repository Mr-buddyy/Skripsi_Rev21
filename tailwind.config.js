/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        // "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                body: ["Poppins", "sans-serif"],
            },
        },
        // colors: {
        //     bgLight: "#ffffff",
        //     bgDark: "#f5f5f5",
        // },
    },
    variants: {
        extend: {
            // Enable after pseudo-class
            after: ["responsive"],
        },
    },
    // plugins: [require("flowbite/plugin")],
};
