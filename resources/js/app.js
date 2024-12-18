import { createApp, h } from 'vue'

import MainLayout from '@/Layouts/MainLayout.vue'
import { ZiggyVue } from 'ziggy-js';
import { Ziggy } from './ziggy.js';
import { createInertiaApp } from '@inertiajs/vue3'
import 'flowbite';



createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        const page = pages[`./Pages/${name}.vue`];

        page.default.layout = page.default.layout || MainLayout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy);

        // Добавляем $route в глобальные свойства
        app.config.globalProperties.$route = route;

        app.mount(el);
    },
});

