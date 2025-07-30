import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0', // Permite acceder desde fuera del contenedor
        port: 5175,
        hmr: {
            host: 'costmanager.test',
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css','resources/js/app.js'],
                refresh: true,
                publicDir: 'public',
            }),
        ],
});
