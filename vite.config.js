// Laravel suggests axios and vite as seen in package.json
// run "npm install" to get these
// then configure vite from here

// npm run build to build assets and get the project ready for production

import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
