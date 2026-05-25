import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: false,
        cors: {
            origin: ['http://localhost:8000', 'http://devprofile.lar', 'http://localhost', 'http://127.0.0.1:8000'],
            credentials: true
        },
        hmr: {
            host: 'localhost',
            protocol: 'ws',
            clientPort: 5173
        }
    },
});
