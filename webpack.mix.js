mix.js("resources/js/app.js", "public/js").postCss(
    "public/build/assets/css/app.css",
    "public/build/assets/css",
    [require("tailwindcss")]
);
mix.copyDirectory("resources/css", "public/build/assets/css");
