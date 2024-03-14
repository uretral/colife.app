import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 'resources/js/app.js',
                /*my*/
                'Modules/My/Resources/assets/css/app.less',
                'Modules/My/Resources/assets/js/app.js',
                /*lk*/
                'Modules/Lk/Resources/assets/css/app.less',
                'Modules/Lk/Resources/assets/js/app.js',
                /*Admin*/
                'Modules/Admin/Resources/assets/less/app.less',
                'Modules/Admin/Resources/assets/less/tenant.less',
                'Modules/Admin/Resources/assets/less/my.less',
                'Modules/Admin/Resources/assets/js/app.js'
            ],
            refresh: true,
            // template: {
            //     transformAssetUrls: {
            //         includeAbsolute: false,
            //     },
            // },
        }),
    ],
});
