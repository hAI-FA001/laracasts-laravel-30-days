/** @type {import('tailwindcss').Config}*/

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.css",
    ],
    theme: {
        extend: {
            colors: {
                laracasts: "rgb(50,138,241)",
            },
        },
    },
    plugins: [],
};
