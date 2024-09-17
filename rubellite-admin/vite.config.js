import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import commonjs from 'vite-plugin-commonjs';
import compression from 'vite-plugin-compression';

export default defineConfig({
    plugins: [
        laravel([
            'resources/scss/user.scss',
            'resources/ts/app.ts',
            'resources/scss/admin.scss',
            'resources/ts/admin.ts',
        ]),
        commonjs(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        compression({
            algorithm: 'gzip',
            ext: '.gz',
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/ts'
        }
    },
    build: {
        commonjsOptions: {
            exclude: [
                  'ckeditor5-custom-build', 
            ]
        },
        optimizeDeps: {
            include: [
                'ckeditor5-custom-build',
            ],
        },
        rollupOptions: {
            input: {
                app: 'resources/ts/app.ts', // Entry point for TypeScript
                admin: 'resources/ts/admin.ts', // Entry point for TypeScript
                style: 'resources/scss/user.scss', // Entry point for CSS
                adminstyle: 'resources/scss/admin.scss', // Entry point for CSS
            },
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return id.toString().split('node_modules/')[1].split('/')[0].toString();
                    }
                },
            },
        },
        minify: 'esbuild',
    },
});