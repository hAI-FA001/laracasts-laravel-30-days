// Laravel suggests axios and vite as seen in package.json
// run "npm install" to get these
// then configure vite from here

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
