mix.js("resources/js/app.js", "public/js").postCss(
<<<<<<< HEAD
    "resources/css/app.css",
    "public/css",
    [require("tailwindcss")]
);
mix.copyDirectory("resources/assets", "public/assets");
=======
    "public/build/assets/css/app.css",
    "public/build/assets/css",
    [require("tailwindcss")]
);
mix.copyDirectory("resources/css", "public/build/assets/css");
>>>>>>> origin/main
