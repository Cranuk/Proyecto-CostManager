import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/global.css',
                'resources/css/menu.css',
                'resources/css/forms.css',
                'resources/css/tables.css',
                'resources/css/modal.css',
                'resources/css/footer.css',
                'resources/js/app.js',
                'resources/js/modal.js',
                'resources/js/script.js',
                ],
                refresh: true,
                publicDir: 'public',
            }),
        ],
        resolve: {
            alias: {
                '$': 'jquery'
            },
        },
});
