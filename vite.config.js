import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue()
    ],
    resolve: {
        alias: {
            '$': 'jQuery',
        },
    },
    optimizeDeps: {
        exclude: ['js-big-decimal']
    }
});
