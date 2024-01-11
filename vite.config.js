import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css2/app.css2', 'resources/js2/app.js2'],
            refresh: true,
        }),
    ],
});
